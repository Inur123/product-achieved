@extends('frontend.layouts.app')
@section('title', 'Checkout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8 pt-20">
        <!-- Notifikasi Sukses -->
        @if (session('success') || session('error') || session('warning') || session('info'))
            <div id="alert" class="fixed top-4 right-4 md:right-10 z-50">
                <div class="bg-{{ session('success') ? 'green' : (session('error') ? 'red' : (session('warning') ? 'yellow' : 'blue')) }}-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between w-full md:w-auto"
                    role="alert">
                    <span
                        class="mr-2">{{ session('success') ?? (session('error') ?? (session('warning') ?? session('info'))) }}</span>
                    <button type="button" class="close-alert text-white hover:text-gray-300 focus:outline-none">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <!-- Left Column - Cart Items -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-6">Your Cart</h2>

                @if ($product)
                    <!-- Tampilkan produk tunggal -->
                    <div class="flex items-start space-x-4 pb-6 border-b">
                        <div class="w-24 h-24 bg-gray-100 rounded-lg">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/placeholder.svg') }}"
                                alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm">
                                {{ Str::limit($product->description ?? 'No description available.', 50, '...') }}</p>
                            <div class="inline-block px-2 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded mt-2">
                                {{ $product->category->name }} <!-- Display category name -->
                            </div>
                        </div>
                        <div class="text-right">
                            <!-- Display product price or promotion -->
                            <p class="text-primary font-semibold">
                                @if ($promotions->isNotEmpty())
                                    @php
                                        $isPromoActive = false;
                                        $promoPrice = $product->harga;
                                    @endphp
                                    @foreach ($promotions as $promotion)
                                        @if ($promotion->product_id == $product->id && $promotion->end_date >= \Carbon\Carbon::now())
                                            @php
                                                $isPromoActive = true;
                                                if ($promotion->discount_type == 'percentage') {
                                                    $promoPrice = $product->harga * (1 - $promotion->discount_value / 100);
                                                } else {
                                                    $promoPrice = $product->harga - $promotion->discount_value;
                                                }
                                            @endphp
                                            <!-- Tampilkan harga asli dan harga promo -->
                                            <span class="text-gray-500 line-through">Rp.
                                                {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            <br>
                                            Rp. {{ number_format($promoPrice, 0, ',', '.') }}
                                        @endif
                                    @endforeach
                                    @if (!$isPromoActive)
                                        <!-- Jika tidak ada promo aktif, tampilkan harga normal -->
                                        Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                    @endif
                                @else
                                    <!-- Jika tidak ada promo, tampilkan harga normal -->
                                    Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                @endif
                            </p>
                        </div>
                    </div>
                @elseif (isset($products) && is_array($products) && count($products) > 0)
                    <!-- Tampilkan semua produk di keranjang -->
                    @foreach ($products as $item)
                        @php
                            $product = $item['product'];
                            $price = $item['price'];
                            $originalPrice = $item['original_price'];
                            $promotions = $item['promotions'];
                        @endphp
                        <div class="flex items-start space-x-4 pb-6 border-b">
                            <div class="w-24 h-24 bg-gray-100 rounded-lg">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/placeholder.svg') }}"
                                    alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm">
                                    {{ Str::limit($product->description ?? 'No description available.', 50, '...') }}</p>
                                <div class="inline-block px-2 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded mt-2">
                                    {{ $product->category->name }} <!-- Display category name -->
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-primary font-semibold">
                                    @if ($promotions->isNotEmpty())
                                        @php
                                            $isPromoActive = false;
                                            $promoPrice = $originalPrice;
                                        @endphp
                                        @foreach ($promotions as $promotion)
                                            @if ($promotion->product_id == $product->id && $promotion->end_date >= \Carbon\Carbon::now())
                                                @php
                                                    $isPromoActive = true;
                                                    if ($promotion->discount_type == 'percentage') {
                                                        $promoPrice = $originalPrice * (1 - $promotion->discount_value / 100);
                                                    } else {
                                                        $promoPrice = $originalPrice - $promotion->discount_value;
                                                    }
                                                @endphp
                                                <!-- Tampilkan harga asli dan harga promo -->
                                                <span class="text-gray-500 line-through">Rp.
                                                    {{ number_format($originalPrice, 0, ',', '.') }}</span>
                                                <br>
                                                Rp. {{ number_format($promoPrice, 0, ',', '.') }}
                                            @endif
                                        @endforeach
                                        @if (!$isPromoActive)
                                            <!-- Jika tidak ada promo aktif, tampilkan harga normal -->
                                            Rp. {{ number_format($originalPrice, 0, ',', '.') }}
                                        @endif
                                    @else
                                        <!-- Jika tidak ada promo, tampilkan harga normal -->
                                        Rp. {{ number_format($originalPrice, 0, ',', '.') }}
                                    @endif
                                </p>
                                <!-- Remove button -->
                                <form action="{{ route('transaction.remove.from.cart', ['slug' => $product->slug]) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm mt-0 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Tampilkan pesan jika keranjang kosong -->
                    <div class="text-center py-8">
                        <p class="text-gray-600">Your cart is empty.</p>
                        <a href="{{ route('all-product') }}"
                            class="mt-4 inline-block px-6 py-2 bg-primary text-white rounded-lg">Continue Shopping</a>
                    </div>
                @endif
            </div>

            <!-- Customer Information -->
            @if (isset($products) && is_array($products) && count($products) > 0)
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Customer Information</h2>
                    <form action="{{ route('transaction.complete.purchase') }}" method="POST" id="checkout-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" name="name" placeholder="Enter your full name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" name="email" placeholder="Enter your email address"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                        required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                                    <input type="tel" name="phone" placeholder="Enter your WhatsApp number"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Proof of Payment</label>
                                    <input type="file" name="proof_of_payment"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                        required>
                                    <p class="text-sm text-gray-500 mt-1">Upload your payment proof (JPG, PNG, or PDF, max
                                        2MB).</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <textarea name="address" placeholder="Enter your complete address" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required></textarea>
                            </div>

                            <!-- Hidden input for product IDs -->
                            @foreach ($products as $item)
                                <input type="hidden" name="product_ids[]" value="{{ $item['product']->id }}">
                            @endforeach
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <!-- Right Column - Order Summary -->
        @if (isset($products) && is_array($products) && count($products) > 0)
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Order Summary</h2>
                    <div class="space-y-4">
                        <!-- Subtotal -->
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <!-- Total -->
                        <div class="border-t pt-4">
                            <div class="flex justify-between">
                                <span class="font-bold">Total</span>
                                <span class="font-bold text-primary">Rp. {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol "Complete Purchase" -->
                    <button type="submit" form="checkout-form"
                        class="w-full bg-primary text-white py-3 rounded-lg font-medium mt-6">
                        Complete Purchase
                    </button>

                    <p class="text-sm text-gray-500 text-center mt-4">
                        By completing your purchase, you agree to our
                        <a href="#" class="text-primary">Terms of Service</a> and
                        <a href="#" class="text-primary">Privacy Policy</a>.
                    </p>
                </div>

                <!-- Informasi Rekening Bank -->
                <div class="bg-white p-6 rounded-lg shadow-sm mt-6">
                    <h3 class="text-lg font-semibold mb-4">Payment Instructions</h3>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-gray-700 font-medium mb-2">Please transfer the exact amount to the following bank
                            account:</p>
                        <div class="space-y-2">
                            <p class="text-gray-700"><span class="font-bold">Bank Name:</span> Bank Central Asia (BCA)</p>
                            <p class="text-gray-700"><span class="font-bold">Account Number:</span> 1234567890</p>
                            <p class="text-gray-700"><span class="font-bold">Account Name:</span> PT Achieved Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen notifikasi
        const alertElement = document.getElementById('alert');
        const closeAlertButton = document.querySelector('.close-alert');

        // Jika notifikasi ada
        if (alertElement) {
            // Tutup notifikasi setelah 5 detik
            setTimeout(() => {
                alertElement.remove();
            }, 500); // 5000 milidetik = 5 detik

            // Tutup notifikasi saat tombol close diklik
            if (closeAlertButton) {
                closeAlertButton.addEventListener('click', () => {
                    alertElement.remove();
                });
            }
        }
    });
</script>
