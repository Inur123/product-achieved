<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{

    public function checkout($slug = null)
    {
        // Jika slug tidak ada, tampilkan produk di keranjang
        if (!$slug) {
            // Ambil keranjang dari session
            $cart = session()->get('cart', []);

            // Jika keranjang kosong, kembalikan view dengan data kosong
            if (empty($cart)) {
                return view('frontend.transactions.checkout', [
                    'product' => null,
                    'products' => [], // Inisialisasi dengan array kosong
                    'promotions' => collect(), // Koleksi kosong untuk promotions
                    'subtotal' => 0,
                    'tax' => 0,
                    'total' => 0,
                    'cart' => $cart, // Kirim data keranjang ke view
                ]);
            }

            // Ambil data produk dari keranjang
            $products = [];
            $subtotal = 0;

            foreach ($cart as $item) {
                $product = Product::where('slug', $item['slug'])->first();
                if ($product) {
                    // Ambil promo yang masih aktif untuk produk ini
                    $promotions = Promotion::where('product_id', $product->id)
                        ->where('end_date', '>=', now())
                        ->get();

                    // Hitung harga promo (jika ada)
                    $productPrice = $product->harga;
                    $promoPrice = $productPrice; // Default: harga normal
                    foreach ($promotions as $promotion) {
                        if ($promotion->discount_type == 'percentage') {
                            $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
                        } else {
                            $promoPrice = max(0, $productPrice - $promotion->discount_value);
                        }
                        break; // Ambil promo pertama yang ditemukan
                    }

                    // Simpan harga promo atau harga normal
                    $products[] = [
                        'product' => $product,
                        'price' => $promoPrice, // Gunakan harga promo jika ada, jika tidak gunakan harga normal
                        'original_price' => $productPrice, // Simpan harga asli
                        'promotions' => $promotions, // Kirim data promo ke view
                    ];

                    // Tambahkan ke subtotal
                    $subtotal += $promoPrice;
                }
            }

            // Hitung total
            $tax = 0; // Pajak (jika ada)
            $total = $subtotal + $tax;

            return view('frontend.transactions.checkout', [
                'product' => null, // Tidak ada produk tunggal
                'products' => $products, // Kirim semua produk di keranjang
                'promotions' => collect(), // Promo tidak berlaku untuk keranjang
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'cart' => $cart, // Kirim data keranjang ke view
            ]);
        }

        // Jika slug ada, tampilkan produk tunggal seperti sebelumnya
        $product = Product::where('slug', $slug)->firstOrFail();

        // Ambil promo yang masih aktif
        $promotions = Promotion::where('product_id', $product->id)
            ->where('end_date', '>=', now())
            ->get();

        // Harga produk asli
        $productPrice = $product->harga;

        // Hitung harga promo (jika ada)
        $promoPrice = $productPrice; // Default: harga normal
        foreach ($promotions as $promotion) {
            if ($promotion->discount_type == 'percentage') {
                $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
            } else {
                $promoPrice = max(0, $productPrice - $promotion->discount_value);
            }
            break; // Ambil promo pertama yang ditemukan
        }

        // Hitung subtotal
        $subtotal = $promoPrice;

        // Pajak (jika ada), default ke 0
        $tax = 0;

        // Hitung total harga
        $total = $subtotal + $tax;

        // Kirim data ke tampilan checkout
        return view('frontend.transactions.checkout', compact('product', 'promotions', 'subtotal', 'tax', 'total'));
    }

    public function addToCart(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Cek apakah produk sudah ada di keranjang
        if (isset($cart[$slug])) {
            return redirect()->back()->with('warning', 'Product is already in your cart.');
        }

        // Tambahkan produk ke keranjang
        $cart[$slug] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->harga,
            "image" => $product->image,
            "slug" => $product->slug
        ];

        // Simpan keranjang ke session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function removeFromCart($slug)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$slug])) {
            unset($cart[$slug]);
            session()->put('cart', $cart);
        }

        return redirect()->route('transaction.checkout')->with('success', 'Product removed from cart.');
    }

    public function store(Request $request)
{
    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'product_ids' => 'required|array', // Ensure product IDs are provided
        'proof_of_payment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Max 2MB
    ]);

    // Generate a unique transaction code using Str::random()
    $transactionCode = 'ACH-' . strtoupper(Str::random(15));

    // Start a new transaction
    $transaction = Transaction::create([
        'transaction_code' => $transactionCode, // Assign the generated transaction code
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'status' => 'pending',
        'total_price' => 0, // Akan diupdate setelah menghitung total harga
        'proof_of_payment' => '', // Akan diupdate setelah upload file
    ]);

    $totalPrice = 0;

    // Handle file upload
    if ($request->hasFile('proof_of_payment')) {
        $file = $request->file('proof_of_payment');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('proofs', $fileName, 'public'); // Simpan file di folder 'storage/app/public/proofs'
        $transaction->proof_of_payment = $filePath;
    }

    // Attach products to the transaction with promo calculation
    foreach ($request->product_ids as $productId) {
        $product = Product::find($productId);
        if ($product) {
            // Cek apakah ada promo aktif untuk produk ini
            $promotion = Promotion::where('product_id', $product->id)
                ->where('end_date', '>=', now())
                ->first();

            // Hitung harga promo jika ada
            $productPrice = $product->harga;
            if ($promotion) {
                if ($promotion->discount_type == 'percentage') {
                    $productPrice = $product->harga * (1 - ($promotion->discount_value / 100));
                } else {
                    $productPrice = max(0, $product->harga - $promotion->discount_value);
                }
            }

            // Simpan transaksi produk dengan harga yang sesuai
            $transaction->products()->attach($product->id, [
                'quantity' => 1, // Anggap jumlahnya 1, bisa diubah sesuai kebutuhan
                'price' => $productPrice,
            ]);

            // Tambahkan harga ke total transaksi
            $totalPrice += $productPrice;
        }
    }

    // Update total price setelah semua produk ditambahkan
    $transaction->total_price = $totalPrice;
    $transaction->save();

    // Clear the cart
    session()->forget('cart');

    // Redirect ke halaman pending transaksi
    return redirect()->route('transaction.pending', ['transaction_code' => $transactionCode])
        ->with('success', 'Transaction successful!');
}


    // Tampilan halaman sukses setelah transaksi berhasil
    public function pending(Request $request)
    {
        // Retrieve the transaction code from the URL
        $transactionCode = $request->transaction_code;

        // Retrieve the transaction using the transaction code
        $transaction = Transaction::where('transaction_code', $transactionCode)->first();

        // Check if the transaction exists
        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaction not found!');
        }

        // Retrieve the associated product for the transaction
        $product = $transaction->products()->first(); // Assuming there's only one product per transaction

        // If the status is not completed, show the pending view
        return view('frontend.transactions.pending', compact('transaction', 'product'));
    }

    public function cekTransactionForm()
    {
        return view('frontend.transactions.cek-transactions');
    }
    public function cekTransaction(Request $request)
    {
        // Validate the input with a custom error message
        $request->validate([
            'transaction_id' => 'required|string|exists:transactions,transaction_code',
        ], [
            'transaction_id.required' => 'Isi kode transaksi!',
            'transaction_id.exists' => 'Kode Transaksi tidak ditemukan!',
        ]);

        // Get the transaction using the entered transaction ID
        $transaction = Transaction::where('transaction_code', $request->transaction_id)->first();

        // Retrieve the associated product
        $product = $transaction->products()->first();

        // Return the view with transaction and product data
        return view('frontend.transactions.cek-transactions', compact('transaction', 'product'));
    }

    public function removeProduct($slug)
    {
        // Cari produk berdasarkan slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Lakukan logika penghapusan produk dari keranjang (sesuaikan dengan kebutuhan Anda)
        // Contoh: Hapus produk dari session atau database keranjang

        // Redirect kembali ke halaman checkout dengan pesan sukses
        return redirect()->route('transaction.checkout')->with('success', 'Product removed from cart.');
    }
}
