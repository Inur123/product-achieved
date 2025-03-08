@extends('frontend.layouts.app')
@section('title', 'all products')
@section('content')
    <div>

        <!-- Page Header -->
        <section class="bg-gradient-to-r from-primary to-secondary py-16 pt-24">
            <div class="container mx-auto px-4">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">All Products</h1>
                    <p class="text-xl max-w-3xl mx-auto">
                        Browse our complete collection of educational e-books designed for young minds
                    </p>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="py-8">
            <div class="container mx-auto px-4">
                <form method="GET" action="{{ route('all-product') }}">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex flex-wrap items-center gap-4">
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select name="category" id="category" onchange="this.form.submit()"
                                    class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="all">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}"
                                            {{ request('category') == $category->slug ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="py-1">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @if ($products->isEmpty())
                        <p class="text-center text-gray-500">No products found in this category.</p>
                    @else
                        @foreach ($products as $product)
                            @php
                                // Check if the product is in an active promotion
                                $isPromo = $product->promotions && $product->promotions->status === 'active' && $product->promotions->end_date >= \Carbon\Carbon::now();
                            @endphp
                            <a href="{{ route('item-detail', ['slug' => $product->slug]) }}" class="block">
                                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                        @if ($product->category)
                                            <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                                                {{ $product->category->name }}
                                            </div>
                                        @endif

                                        <!-- Promo Label Positioned Bottom-Left -->
                                        @if ($isPromo)
                                            <div class="absolute bottom-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                                Promo
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold mb-2">{{ $product->name }}</h3>
                                        <p class="text-gray-600 text-sm mb-3">
                                            {{ Str::limit($product->description ?? 'No description available.', 50, '...') }}
                                        </p>

                                        <div class="flex justify-between items-center">
                                            @if ($isPromo)
                                                <span class="text-gray-500 text-sm line-through">Rp
                                                    {{ number_format($product->harga, 0, ',', '.') }}</span>
                                                <span class="text-primary font-bold">
                                                    Rp
                                                    {{ number_format(
                                                        $product->promotions->discount_type == 'percentage'
                                                            ? $product->harga * (1 - $product->promotions->discount_value / 100)
                                                            : max(0, $product->harga - $product->promotions->discount_value),
                                                        0,
                                                        ',',
                                                        '.',
                                                    ) }}
                                                </span>
                                            @else
                                                <span class="text-primary font-bold">Rp
                                                    {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>




                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-600">Showing
                        {{ ($products->currentPage() - 1) * $products->perPage() + 1 }}-{{ min($products->currentPage() * $products->perPage(), $products->total()) }}
                        of {{ $products->total() }} products</p>
                    <div class="flex space-x-2">
                        <a href="{{ $products->previousPageUrl() }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $products->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                        @php
                            $start = max($products->currentPage() - 2, 1);
                            $end = min($start + 4, $products->lastPage());

                            if ($end - $start < 4 && $products->lastPage() > 5) {
                                $start = max($products->lastPage() - 4, 1);
                                $end = $products->lastPage();
                            }
                        @endphp

                        @if ($start > 1)
                            <a href="{{ $products->url(1) }}"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                            @if ($start > 2)
                                <span class="px-3 py-1 text-gray-600">...</span>
                            @endif
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            <a href="{{ $products->url($i) }}"
                                class="px-3 py-1 rounded {{ $products->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                        @endfor

                        @if ($end < $products->lastPage())
                            @if ($end < $products->lastPage() - 1)
                                <span class="px-3 py-1 text-gray-600">...</span>
                            @endif
                            <a href="{{ $products->url($products->lastPage()) }}"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $products->lastPage() }}</a>
                        @endif

                        <a href="{{ $products->nextPageUrl() }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $products->hasMorePages() ? '' : 'disabled' }}">Next</a>
                    </div>
                </div>

        </section>
    </div>
@endsection
