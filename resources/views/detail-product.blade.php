@extends('frontend.layouts.app')
@section('title', 'Detail Product')
@section('content')
<style>
    body {
        background-color: #f8f9fa;
        padding-top: 70px;
    }

    .gradient-bg {
        background: linear-gradient(90deg, #2A6B96 0%, #5AA7D4 100%);
    }
</style>

<!-- Product Detail Header -->
<div class="gradient-bg py-12 text-center text-white">
    <h1 class="text-3xl font-bold mb-2">Product Detail</h1>
    <p>Explore the details of this amazing product!</p>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Left Column - Product Image -->
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/placeholder.svg') }}"
            alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
    </div>

    <!-- Right Column - Product Details -->
    <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-4 text-dark">{{ $product->name }}</h2>
            <div class="inline-block px-2 py-1 bg-secondary bg-opacity-10 text-primary text-xs font-medium rounded mb-4">
                {{ $product->category->name }} <!-- Display the category name -->
            </div>
            <p class="text-gray-600 mb-6">{{ $product->description }}</p>

            <!-- Product Price (with promotions, if any) -->
            <p class="text-primary font-semibold text-2xl mb-6">
                @if ($promotions->isNotEmpty())
                    @php
                        $isPromoActive = false;
                        $promoPrice = $product->harga;
                    @endphp
                    @foreach ($promotions as $promotion)
                        @if ($promotion->product_id == $product->id && $promotion->end_date >= \Carbon\Carbon::now())
                            @php
                                $isPromoActive = true;
                            @endphp
                            <!-- If the promotion is active, display discounted price -->
                            @if ($promotion->discount_type == 'percentage')
                                <span class="line-through text-gray-500">Rp.
                                    {{ number_format($product->harga, 0, ',', '.') }}</span>
                                Rp.
                                {{ number_format($product->harga * (1 - $promotion->discount_value / 100), 0, ',', '.') }}
                            @else
                                <span class="line-through text-gray-500">Rp.
                                    {{ number_format($product->harga, 0, ',', '.') }}</span>
                                Rp. {{ number_format($product->harga - $promotion->discount_value, 0, ',', '.') }}
                            @endif
                        @endif
                    @endforeach
                    @if (!$isPromoActive)
                        <!-- If no active promotions, display regular price -->
                        Rp. {{ number_format($product->harga, 0, ',', '.') }}
                    @endif
                @else
                    <!-- If no promotions are active, display the regular price -->
                    Rp. {{ number_format($product->harga, 0, ',', '.') }}
                @endif
            </p>
        </div>

        <!-- Add to Cart and Buy Buttons at the bottom -->
        <div class="flex space-x-4 mt-6">
            @php
                $cart = session()->get('cart', []);
                $isInCart = isset($cart[$product->slug]);
            @endphp

            @if ($isInCart)
                <!-- Jika produk sudah ada di keranjang, tampilkan pesan -->
                <div class="w-full bg-yellow-100 text-yellow-800 py-3 rounded-lg font-medium text-center">
                    Product is already in your cart.
                </div>
            @else
                <!-- Jika produk belum ada di keranjang, tampilkan tombol "Add to Cart" -->
                <form action="{{ route('transaction.add.to.cart', ['slug' => $product->slug]) }}" method="POST" class="w-1/4">
                    @csrf
                    <button type="submit"
                        class="w-full bg-secondary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                </form>
            @endif

            <!-- Buy Button -->
            <button class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition"
                onclick="window.location.href='{{ route('transaction.checkout') }}'">
                Beli
            </button>

        </div>
    </div>
</div>
@endsection
