<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Coupon;
use App\Mail\TransactionConfirmation;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function checkout($slug = null)
    {  session()->forget('coupon_code');
        session()->forget('coupon_product_id');
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
                    'discount' => 0, // Tidak ada diskon
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
                        ->where('status', 'active') // Pastikan hanya promo dengan status 'active' yang diambil
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

            // Ambil kupon jika ada
            $discount = 0;
            $couponCode = session()->get('coupon_code');
            $coupon = null;
            if ($couponCode) {
                $coupon = Coupon::where('code', $couponCode)->first();
                if ($coupon) {
                    if ($coupon->discount_type == 'percentage') {
                        $discount = $subtotal * ($coupon->discount_value / 100);
                    } else {
                        $discount = min($coupon->discount_value, $subtotal); // Hindari diskon lebih besar dari subtotal
                    }
                }
            }

            // Hitung total setelah diskon
            $tax = 0; // Pajak (jika ada)
            $total = $subtotal - $discount + $tax;

            return view('frontend.transactions.checkout', [
                'product' => null, // Tidak ada produk tunggal
                'products' => $products, // Kirim semua produk di keranjang
                'promotions' => collect(), // Promo tidak berlaku untuk keranjang
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'cart' => $cart, // Kirim data keranjang ke view
                'discount' => $discount, // Kirim diskon ke view
                'coupon' => $coupon, // Kirim data kupon ke view
            ]);
        }

        // Jika slug ada, tampilkan produk tunggal seperti sebelumnya
        $product = Product::where('slug', $slug)->firstOrFail();

        // Ambil promo yang masih aktif
        $promotions = Promotion::where('product_id', $product->id)
            ->where('status', 'active') // Pastikan hanya promo dengan status 'active' yang diambil
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

        // Ambil kupon jika ada
        $discount = 0;
        $couponCode = session()->get('coupon_code');
        $coupon = null;
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
            if ($coupon) {
                if ($coupon->discount_type == 'percentage') {
                    $discount = $subtotal * ($coupon->discount_value / 100);
                } else {
                    $discount = min($coupon->discount_value, $subtotal);
                }
            }
        }

        // Pajak (jika ada), default ke 0
        $tax = 0;

        // Hitung total harga setelah diskon
        $total = $subtotal - $discount + $tax;

        // Kirim data ke tampilan checkout
        return view('frontend.transactions.checkout', compact('product', 'promotions', 'subtotal', 'tax', 'total', 'discount', 'coupon'));
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
        'subtotal' => 'required|numeric', // Ensure subtotal is received
    ]);

    // Generate a unique transaction code using Str::random()
    $transactionCode = 'ACH-' . strtoupper(Str::random(15));

    // Get coupon from session if exists
    $couponCode = session()->get('coupon_code');
    $coupon = null;
    $discount = 0;

    if ($couponCode) {
        // Check if coupon exists and is active
        $coupon = Coupon::where('code', $couponCode)
            ->where('status', 'active')
            ->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'The coupon is no longer valid or has expired.');
        }

        // Check if coupon has reached its usage limit
        if ($coupon->limit !== null && $coupon->used >= $coupon->limit) {
            return redirect()->back()->with('error', 'Coupon has reached its usage limit.');
        }

        // Verify that the coupon can be applied to at least one product in the cart
        $validForAnyProduct = false;
        foreach ($request->product_ids as $productId) {
            $validProduct = $coupon->products()
                ->where('product_id', $productId)
                ->exists();

            if ($validProduct) {
                $validForAnyProduct = true;
                break;
            }
        }

        if (!$validForAnyProduct) {
            return redirect()->back()->with('error', 'This coupon cannot be applied to any of the selected products.');
        }

        // Calculate discount based on coupon type
        if ($coupon->discount_type == 'percentage') {
            $discount = $request->subtotal * ($coupon->discount_value / 100);
        } else {
            $discount = min($coupon->discount_value, $request->subtotal);
        }

        // Increment coupon usage if it has a limit
        if ($coupon->limit !== null) {
            $coupon->increment('used');
        }
    }

    // Handle file upload
    $filePath = '';
    if ($request->hasFile('proof_of_payment')) {
        $file = $request->file('proof_of_payment');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('proofs', $fileName, 'public'); // Save file in 'storage/app/public/proofs' folder
    }

    // Start a new transaction
    $transaction = Transaction::create([
        'transaction_code' => $transactionCode,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'status' => 'pending',
        'total_price' => 0, // Will be updated after calculating total price
        'proof_of_payment' => $filePath,
        'coupon_id' => $coupon ? $coupon->id : null,
        'discount' => $discount,
    ]);

    $totalPrice = 0;

    // Attach products to the transaction with promo calculation
    foreach ($request->product_ids as $productId) {
        $product = Product::find($productId);
        if ($product) {
            // Check if there's an active promotion for this product
            $promotion = Promotion::where('product_id', $product->id)
                ->where('status', 'active')
                ->where('end_date', '>=', now())
                ->first();

            // Calculate promotional price if applicable
            $productPrice = $product->harga;
            if ($promotion) {
                if ($promotion->discount_type == 'percentage') {
                    $productPrice = $product->harga * (1 - ($promotion->discount_value / 100));
                } else {
                    $productPrice = max(0, $product->harga - $promotion->discount_value);
                }
            }

            // Save product transaction with appropriate price
            $transaction->products()->attach($product->id, [
                'quantity' => 1, // Assume quantity is 1, can be changed as needed
                'price' => $productPrice,
            ]);

            // Add price to transaction total
            $totalPrice += $productPrice;
        }
    }

    // Update total price after all products have been added
    $transaction->total_price = $totalPrice - $discount; // Subtract discount from total price
    $transaction->save();

    // Kirim email konfirmasi
    Mail::to($transaction->email)->send(new TransactionConfirmation($transaction));

    // Clear the cart and coupon from session
    session()->forget('cart');
    session()->forget('coupon_code');
    session()->forget('coupon_product_id');

    // Redirect to transaction pending page
    return redirect()->route('transaction.pending', ['transaction_code' => $transactionCode])
        ->with('success', 'Transaction successful!');
}
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

    public function applyCoupon(Request $request)
{
    $request->validate([
        'code' => 'required|string',
        'product_id' => 'required|exists:products,id', // Validate product_id exists
    ]);

    // First check if the coupon exists at all (regardless of status)
    $couponExists = Coupon::where('code', $request->code)->exists();

    if (!$couponExists) {
        return response()->json([
            'success' => false,
            'message' => 'Coupon code not found.',
        ]);
    }

    // Then check if the coupon is active
    $coupon = Coupon::where('code', $request->code)
        ->where('status', 'active')
        ->first();

    if (!$coupon) {
        return response()->json([
            'success' => false,
            'message' => 'Coupon code not found.',
        ]);
    }

    // Check if coupon has reached its usage limit
    if ($coupon->limit !== null && $coupon->used >= $coupon->limit) {
        return response()->json([
            'success' => false,
            'message' => 'Coupon has reached its usage limit.',
        ]);
    }

    // Check if the product is associated with this coupon
    $validProduct = $coupon->products()
        ->where('product_id', $request->product_id)
        ->exists();

    if (!$validProduct) {
        return response()->json([
            'success' => false,
            'message' => 'This coupon cannot be applied to the selected product.',
        ]);
    }

    // Save coupon code to session (optional - depending on your needs)
    session()->put('coupon_code', $request->code);
    session()->put('coupon_product_id', $request->product_id);

    return response()->json([
        'success' => true,
        'discount' => $coupon->discount_value,
        'discount_type' => $coupon->discount_type,
    ]);
}
}
