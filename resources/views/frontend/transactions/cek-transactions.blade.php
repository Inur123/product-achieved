<!-- resources/views/frontend/transactions/cek-transactions.blade.php -->
@extends('frontend.layouts.app')
@section('title', 'Cek Transaksi')
@section('content')
<section class="py-12 bg-white pt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Form untuk cek transaksi -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-6 text-center">Cek Transaksi</h3>
                <form action="{{ route('transactions.cek') }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    <div class="mb-4">
                        <label for="transaction-id" class="block text-gray-700 font-semibold mb-2">Kode Transaksi</label>
                        <input type="text" id="transaction-id" name="transaction_id" placeholder="Isi kode transaksi  (e.g., ACH-2025...)"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                        @error('transaction_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition">Cek Status</button>
                </form>
            </div>

            <!-- Hasil Pengecekan Transaksi -->
            @if(isset($transaction))
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-6 text-center">Transaction Details</h3>

                <!-- Tampilkan detail transaksi -->
                <p class="text-gray-500 mb-6 flex items-center">
                    Transaction ID:
                    <span id="transaction-id" class="font-bold text-dark ml-2">{{ $transaction->transaction_code }}</span>
                    <!-- Ikon untuk copy -->
                    <button onclick="copyTransactionCode('{{ $transaction->transaction_code }}')" class="ml-2 text-gray-500 hover:text-primary focus:outline-none relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        <!-- Feedback "Copied" -->
                        <span id="copy-feedback" class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 transition-opacity duration-300">
                            Copied
                        </span>
                    </button>
                </p>

                <!-- Status Order -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold mb-3">Order Status</h4>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full {{ $transaction->status === 'pending' ? 'text-pending bg-yellow-200' : 'text-success bg-green-200' }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block {{ $transaction->status === 'pending' ? 'text-pending' : 'text-success' }}">
                                    {{ $transaction->status === 'pending' ? '50%' : '100%' }}
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded {{ $transaction->status === 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                            <div style="width: {{ $transaction->status === 'pending' ? '50%' : '100%' }}"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center {{ $transaction->status === 'pending' ? 'bg-pending' : 'bg-success' }} animate-progress">
                            </div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500">
                            <span class="font-medium">Order Placed</span>
                            <span class="font-medium">Payment {{ $transaction->status === 'pending' ? 'Pending' : 'Confirmed' }}</span>
                            <span>Completed</span>
                        </div>
                    </div>
                </div>

                <!-- Informasi Pelanggan dan Ringkasan Order -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Customer Information -->
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                        <h4 class="text-lg font-semibold mb-4 text-primary flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Customer Information
                        </h4>
                        <div class="space-y-3">
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

                <!-- Daftar Produk yang Dibeli -->
                <div class="border-t border-gray-200 pt-6">
                    <h4 class="text-lg font-semibold mb-3">Purchased Items</h4>
                    <div class="space-y-4">
                        @foreach($transaction->products as $product)
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-gray-200 rounded-md overflow-hidden mr-4">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-semibold">{{ $product->name }}</h5>
                                    <p class="text-gray-500 text-sm">{{ Str::limit($product->description, 50, '...') }}</p>
                                </div>
                                <div class="text-right">
                                    @php
                                        $promotion = $product->promotions; // Get the single promotion for the product
                                        $originalPrice = $product->harga;
                                        $discountedPrice = $originalPrice; // Default to original price
                                    @endphp

                                    <!-- Check if there is an active promotion -->
                                    @if ($promotion && $promotion->status == 'active' && $promotion->end_date >= \Carbon\Carbon::now())
                                        <!-- If the promotion is active, calculate the discounted price -->
                                        @if ($promotion->discount_type == 'percentage')
                                            @php
                                                $discountedPrice = $originalPrice * (1 - $promotion->discount_value / 100);
                                            @endphp
                                        @else
                                            @php
                                                $discountedPrice = $originalPrice - $promotion->discount_value;
                                            @endphp
                                        @endif

                                        <!-- Display original price and discounted price -->
                                        <p class="text-gray-500 line-through">Rp {{ number_format($originalPrice, 0, ',', '.') }}</p>
                                        <p class="font-bold text-primary">
                                            Rp {{ number_format($discountedPrice, 0, ',', '.') }}
                                        </p>
                                    @else
                                        <!-- If no active promotion, display the regular price -->
                                        <p class="font-bold text-primary">
                                            Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                        </p>
                                    @endif

                                    @if($transaction->status === 'completed')
                                        <a href="#" class="text-secondary text-sm font-semibold hover:underline">Download</a>
                                    @else
                                        <span class="text-gray-400 text-sm font-semibold">Download (Pending)</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Script untuk Copy Transaction ID -->
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
        const copyFeedback = document.getElementById('copy-feedback');
        copyFeedback.classList.remove('opacity-0'); // Munculkan pesan
        copyFeedback.classList.add('opacity-100');

        // Sembunyikan pesan setelah 2 detik
        setTimeout(() => {
            copyFeedback.classList.remove('opacity-100');
            copyFeedback.classList.add('opacity-0');
        }, 2000); // 2 detik
    }
</script>
@endsection
