@extends('backend.layouts.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4 bg-gray-50">


    <!-- Transaction Details -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">#{{ $transaction->transaction_code }}</h2>
                    <p class="text-sm text-gray-600 mt-1"> {{ \Carbon\Carbon::parse($transaction->created_at)->format('F j, Y \a\t h:i A') }}</p>
                </div>
                <div class="mt-4 md:mt-0">
                    @if ($transaction->status == 'pending')
                        <span class="px-3 py-1.5 text-sm font-medium rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    @else
                        <span class="px-3 py-1.5 text-sm font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Customer Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $transaction->name }}</p>
                            <p class="text-sm text-gray-600">{{ $transaction->email }}</p>
                            <p class="text-sm text-gray-600">{{ $transaction->phone }}</p>
                            <p class="text-sm text-gray-600">{{ $transaction->address }}</p>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment Information</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="font-medium text-gray-800">Bank Transfer</p>
                    <p class="text-sm text-gray-600 mt-2">Rp{{ number_format($transaction->total_price, 2, ',', '.') }}</p>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-sm font-medium text-gray-700">Payment Proof:</p>
                        <div class="mt-2">
                            @if (!empty($transaction->proof_of_payment))
                                <a href="{{ asset('storage/' . $transaction->proof_of_payment) }}"
                                   target="_blank"
                                   class="text-secondary hover:underline text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Payment Receipt
                                </a>
                            @else
                                <p class="text-gray-500 text-sm">No payment proof available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="p-6 border-t border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($transaction->products as $product)
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/placeholder.svg?height=40&width=32') }}"
                                    alt="Book Cover"
                                    class="h-10 w-8 object-cover mr-3 rounded-lg">

                                    <div>
                                        <p class="text-sm font-medium text-gray-800">{{ $product->name }}</p>
                                        <p class="text-xs text-gray-500">SKU: {{ $product->sku }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-right">Rp. {{ number_format($product->pivot->price, 2) }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-right">{{ $product->pivot->quantity }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 text-right">Rp. {{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="border-t border-gray-100">
                            <td colspan="4" class="px-4 py-3 text-right text-sm font-medium text-gray-600">Subtotal:</td>
                            <td class="px-4 py-3 text-right text-sm font-medium text-gray-800">Rp. {{ number_format($transaction->products->sum(fn($p) => $p->pivot->price * $p->pivot->quantity), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Admin Actions -->
        <div class="p-6 border-t border-gray-100 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Admin Actions</h3>
            <div id="status-section">
                @if ($transaction->status === 'pending')
                    <button id="approve-btn" data-code="{{ $transaction->transaction_code }}" class="px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Approve Transaction
                    </button>
                @else
                    <p class="text-green-600 font-semibold">✔️ Transaction Completed</p>
                @endif
            </div>
        </div>




        <!-- Transaction History -->
        <div class="p-6 border-t border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Transaction History</h3>
            <div class="space-y-4">
                <!-- Transaction Created -->
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Transaction created</p>
                        <p class="text-xs text-gray-500">{{ $transaction->created_at->format('F j, Y \\a\\t h:i A') }}</p>
                    </div>
                </div>

                <!-- Awaiting Admin Approval -->
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Awaiting admin approval</p>
                        <p class="text-xs text-gray-500">{{ $transaction->updated_at->format('F j, Y \\a\\t h:i A') }}</p>
                    </div>
                </div>

                <!-- Transaction Completed (Only if status is 'completed') -->
                @if ($transaction->status === 'completed')
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Transaction completed</p>
                        <p class="text-xs text-gray-500">{{ $transaction->updated_at->format('F j, Y \\a\\t h:i A') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the approve button
    const approveButton = document.getElementById('approve-btn');

    if (approveButton) {
        // Add click event listener for the approve button
        approveButton.addEventListener('click', function () {
            const transactionCode = this.getAttribute('data-code'); // Get transaction code

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to approve this transaction?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2A6B96',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
            }).then((result) => {
                // If the user confirms the action
                if (result.isConfirmed) {
                    // Send AJAX request to update the transaction status
                    $.ajax({
                        url: `/transactions/${transactionCode}/approve`,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",  // CSRF token for security
                        },
                        success: function (response) {
                            if (response.success) {
                                // If approval is successful, update the UI
                                $('#status-section').html('<p class="text-green-600 font-semibold">✔️ Transaction Completed</p>');

                                // Show success notification
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Approved!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                // If the approval fails
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        },
                        error: function (xhr) {
                            // If an error occurs during the AJAX request
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Something went wrong. Please try again.',
                            });
                        }
                    });
                }
            });
        });
    }
});



</script>

@endsection
