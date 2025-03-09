@extends('frontend.layouts.app')
@section('title', 'Payment Pending')
@section('content')
    <section class="py-12 bg-white pt-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Pending Message -->
                <div class="bg-yellow-50 border-2 border-pending rounded-xl p-6 mb-8 text-center">
                    <div class="w-20 h-20 bg-pending rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-pending mb-2">Payment Pending</h2>
                    <p class="text-gray-700 text-lg mb-4">Please wait for the admin to verify your payment.</p>
                    <div class="inline-block bg-white px-4 py-2 rounded-lg shadow-sm relative">
                        <p class="text-gray-500 flex items-center">
                            Transaction ID:
                            <span class="font-bold text-dark ml-2">{{ $transaction->transaction_code }}</span>
                            <!-- Copy Icon -->
                            <button onclick="copyTransactionCode('{{ $transaction->transaction_code }}')"
                                class="ml-2 text-gray-500 hover:text-primary transition relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <!-- Pesan "Copied" -->
                                <span id="copyMessage"
                                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 transition-opacity duration-300 pointer-events-none">Copied</span>
                            </button>
                        </p>
                    </div>
                </div>
                <!-- Transaction Details Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8 transaction-card">
                    <h3 class="text-2xl font-bold mb-6 text-center">Transaction Details</h3>

                    <div class="mb-6">
                        <h4 class="text-lg font-semibold mb-3">Order Status</h4>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span
                                        class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pending bg-yellow-200">
                                        Pending
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-pending">
                                        50%
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                <div style="width: 50%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pending animate-progress">
                                </div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span class="font-medium">Order Placed</span>
                                <span class="font-medium">Payment Pending</span>
                                <span>Completed</span>

                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Customer Information -->
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <h4 class="text-lg font-semibold mb-4 text-primary flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Customer Information
                            </h4>
                            <div class="space-y-2">
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ $transaction->name }}
                                </p>
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $transaction->email }}
                                </p>
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    {{ $transaction->phone }}
                                </p>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <h4 class="text-lg font-semibold mb-4 text-primary flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Order Summary
                            </h4>
                            <div class="space-y-3">
                                <!-- Tanggal -->
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </p>

                                <!-- Jumlah Item -->
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                    Items: {{ $transaction->products->count() }} item
                                </p>

                                <!-- Subtotal -->
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Subtotal: Rp {{ number_format($transaction->total_price + $transaction->discount, 0, ',', '.') }}
                                </p>

                                <!-- Diskon -->
                                @if ($transaction->discount > 0)
                                <p class="text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Discount: Rp&nbsp;<span class="text-success">{{ number_format($transaction->discount, 0, ',', '.') }}</span>
                                </p>
                                @endif

                                <!-- Total Setelah Diskon -->
                                <p class="text-gray-700 font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Total: Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-semibold mb-3">Purchased Items</h4>
                        <div class="space-y-4">
                            @foreach ($transaction->products as $product)
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-gray-200 rounded-md overflow-hidden mr-4">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/placeholder.svg') }}"
                                            alt="{{ $product->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-semibold">{{ $product->name }}</h5>
                                        <p class="text-gray-500 text-sm">
                                            {{ Str::limit($product->description ?? 'No description available.', 50, '...') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-primary">
                                            @php
                                                $promotion = $product->promotions; // Get the single promotion
                                            @endphp

                                            <!-- Check if there is an active promotion -->
                                            @if ($promotion && $promotion->status == 'active' && $promotion->end_date >= \Carbon\Carbon::now())
                                                <!-- If the promotion is active, display the discounted price -->
                                                @if ($promotion->discount_type == 'percentage')
                                                    Rp.
                                                    {{ number_format($product->harga * (1 - $promotion->discount_value / 100), 0, ',', '.') }}
                                                @else
                                                    Rp.
                                                    {{ number_format($product->harga - $promotion->discount_value, 0, ',', '.') }}
                                                @endif
                                            @else
                                                <!-- If no active promotion, display the regular price -->
                                                Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                            @endif
                                        </p>
                                        <span
                                            class="text-yellow-500 text-sm font-semibold">{{ ucfirst($transaction->status) }}</span>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('transactions.cek') }}"
                        class="bg-secondary text-white font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition text-center">Check
                        Order Status</a>
                    <a href="{{ route('all-product') }}"
                        class="bg-primary text-white font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition text-center">Continue
                        Shopping</a>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript untuk Copy Function -->
    <script>
        function copyTransactionCode(code) {
            // Buat elemen input sementara
            const tempInput = document.createElement('input');
            tempInput.value = code;
            document.body.appendChild(tempInput);

            // Pilih teks di dalam input
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Untuk perangkat mobile

            // Salin teks ke clipboard
            document.execCommand('copy');

            // Hapus elemen input sementara
            document.body.removeChild(tempInput);

            // Tampilkan pesan "Copied"
            const copyMessage = document.getElementById('copyMessage');
            copyMessage.classList.remove('opacity-0'); // Munculkan pesan
            copyMessage.classList.add('opacity-100');

            // Sembunyikan pesan setelah 2 detik
            setTimeout(() => {
                copyMessage.classList.remove('opacity-100');
                copyMessage.classList.add('opacity-0');
            }, 200); // 2 detik
        }
    </script>
@endsection
