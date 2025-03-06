<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

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

        // Paginasi hasil query
        $transactions = $query->paginate(10);

        return view('backend.transactions.index', compact('transactions'));
    }


    // // Show the details of a specific transaction
    // public function show($transactionCode)
    // {
    //     $transaction = Transaction::where('transaction_code', $transactionCode)->first();
    //     if (!$transaction) {
    //         return redirect()->route('admin.transactions.index')->with('error', 'Transaction not found');
    //     }
    //     return view('backend.transactions.show', compact('transaction'));
    // }

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
