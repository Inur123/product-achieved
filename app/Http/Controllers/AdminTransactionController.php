<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTransactionController extends Controller
{

    // Display all transactions
    public function index(Request $request)
    {
        // Ambil query dari model Transaction
        $query = Transaction::query();

        // Proses pencarian berdasarkan input 'search'
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('transaction_code', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Proses filter berdasarkan status
        if ($request->has('status') && $request->input('status') != '') {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        // Urutkan berdasarkan tanggal terbaru
        $query->orderBy('created_at', 'desc');

        // Paginasi hasil query
        $transactions = $query->paginate(10);

        // Total jumlah transaksi
        $totalTransactions = Transaction::count();

        // Total jumlah transaksi berdasarkan status (pending dan completed)
        $totalPending = Transaction::where('status', 'pending')->count();
        $totalCompleted = Transaction::where('status', 'completed')->count();

        // Total pendapatan dari transaksi yang telah selesai (completed)
        $totalRevenue = Transaction::where('status', 'completed')
            ->get()
            ->sum(function ($transaction) {
                $totalPriceAfterDiscount = 0;

                foreach ($transaction->products as $product) {
                    $promotions = Promotion::where('product_id', $product->id)
                        ->where('end_date', '>=', now())
                        ->get();

                    $productPrice = $product->harga;
                    $promoPrice = $productPrice;

                    foreach ($promotions as $promotion) {
                        if ($promotion->discount_type == 'percentage') {
                            $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
                        } else {
                            $promoPrice = $productPrice - $promotion->discount_value;
                        }
                    }

                    $totalPriceAfterDiscount += $promoPrice;
                }

                return $totalPriceAfterDiscount;
            });

        return view('backend.transactions.index', compact('transactions', 'totalTransactions', 'totalPending', 'totalCompleted', 'totalRevenue'));
    }




    // Show the details of a specific transaction
    public function show($transactionCode)
    {
        $transaction = Transaction::where('transaction_code', $transactionCode)->first();

        if (!$transaction) {
            return redirect()->route('transactions.index')->with('error', 'Transaction not found');
        }

        return view('backend.transactions.detail', compact('transaction'));
    }
    public function approveTransaction($transactionCode)
{
    // Find the transaction by its code
    $transaction = Transaction::where('transaction_code', $transactionCode)->first();

    if ($transaction) {
        // Change the status to 'completed' when approved
        $transaction->status = 'completed';
        $transaction->save();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Transaction successfully approved.']);
    }

    // Return a failure response if transaction is not found
    return response()->json(['success' => false, 'message' => 'Transaction not found.']);
}





public function destroy($transactionCode)
{
    $transaction = Transaction::where('transaction_code', $transactionCode)->first();

    if ($transaction) {
        $transaction->delete();
        return response()->json(['success' => true, 'message' => 'Transaction deleted successfully.']);
    }

    return response()->json(['success' => false, 'message' => 'Transaction not found.']);
}








    // // Update the status of a specific transaction
    // public function updateStatus(Request $request, $transactionCode)
    // {
    //     $request->validate([
    //         'status' => 'required|string|in:pending,completed,cancelled',
    //     ]);

    //     $transaction = Transaction::where('transaction_code', $transactionCode)->first();

    //     if (!$transaction) {
    //         return redirect()->route('admin.transactions.index')->with('error', 'Transaction not found');
    //     }

    //     $transaction->status = $request->status;
    //     $transaction->save();

    //     return redirect()->route('admin.transactions.index')->with('success', 'Transaction status updated successfully');
    // }

    // // Delete a transaction
    // public function destroy($transactionCode)
    // {
    //     $transaction = Transaction::where('transaction_code', $transactionCode)->first();

    //     if (!$transaction) {
    //         return redirect()->route('admin.transactions.index')->with('error', 'Transaction not found');
    //     }

    //     // Optionally delete associated product entries in pivot table
    //     $transaction->products()->detach();

    //     // Delete the transaction
    //     $transaction->delete();

    //     return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully');
    // }
}
