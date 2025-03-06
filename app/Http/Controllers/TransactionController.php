<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function checkout(Product $product)
    {
        // Retrieve any active promotions for the product
        $promotions = Promotion::where('product_id', $product->id)
            ->where('end_date', '>=', now())
            ->get();

        // Get the price of the product
        $productPrice = $product->harga; // Pastikan ini sesuai dengan kolom harga di database

        // Calculate the promo price (if any)
        $promoPrice = $productPrice; // Default to original price
        foreach ($promotions as $promotion) {
            if ($promotion->product_id == $product->id && $promotion->end_date >= now()) {
                if ($promotion->discount_type == 'percentage') {
                    $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
                } else {
                    $promoPrice = $productPrice - $promotion->discount_value;
                }
                break; // Gunakan promo pertama yang ditemukan
            }
        }

        // Calculate the subtotal (for a single product in this case)
        $subtotal = $promoPrice;

        // Jika tidak menggunakan pajak, set tax ke 0
        $tax = 0;

        // Calculate the total
        $total = $subtotal + $tax;

        // Pass data to the view
        return view('frontend.transactions.checkout', compact('product', 'promotions', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
{
    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'product_id' => 'required|exists:products,id', // Ensure the product exists
        'proof_of_payment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Max 2MB
    ]);

    // Get the product being purchased
    $product = Product::find($request->product_id);

    // Calculate the price for this product (consider promotions, if any)
    $promotions = Promotion::where('product_id', $product->id)
        ->where('end_date', '>=', now())
        ->get();

    $price = $product->harga; // Default to original price
    foreach ($promotions as $promotion) {
        if ($promotion->product_id == $product->id && $promotion->end_date >= now()) {
            if ($promotion->discount_type == 'percentage') {
                $price = $product->harga * (1 - ($promotion->discount_value / 100));
            } else {
                $price = $product->harga - $promotion->discount_value;
            }
            break; // Use the first active promotion
        }
    }

    // Handle file upload
    if ($request->hasFile('proof_of_payment')) {
        $file = $request->file('proof_of_payment');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('proofs', $fileName, 'public'); // Simpan file di folder 'storage/app/public/proofs'
    }

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
        'total_price' => $price, // Set the total price
        'proof_of_payment' => $filePath, // Simpan path file bukti pembayaran
    ]);

    // Attach product to the transaction
    $transaction->products()->attach($product->id, [
        'quantity' => 1, // Assuming quantity is 1
        'price' => $price,
    ]);

    // Redirect to the success page with the transaction code
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

        // Check if the transaction status is 'completed'
        if ($transaction->status == 'completed') {
            // Redirect to the success page if the transaction is completed
            return view('frontend.transactions.success', compact('transaction', 'product'));
        }

        // If the status is not completed, show the pending view
        return view('frontend.transactions.pending', compact('transaction', 'product'));
    }

    public function cekTransactionForm()
    {
        return view('frontend.transactions.cek-transactions');
    }

    public function cekTransaction(Request $request)
{
    // Validate the input
    $request->validate([
        'transaction_id' => 'required|string|exists:transactions,transaction_code',
    ]);

    // Get the transaction using the entered transaction ID
    $transaction = Transaction::where('transaction_code', $request->transaction_id)->first();

    // Check if the transaction exists
    if (!$transaction) {
        return redirect()->back()->with('error', 'Transaction not found!');
    }

    // Retrieve the associated product
    $product = $transaction->products()->first();

    // Return the view with transaction and product data
    return view('frontend.transactions.cek-transactions', compact('transaction', 'product'));
}










}
