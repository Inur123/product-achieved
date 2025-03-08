@extends('frontend.layouts.app')

@section('title','home')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-secondary py-16 pt-24" id="hero" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-white mb-8 md:mb-0" data-aos="fade-right" data-aos-delay="100">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                    Discover the Joy of Reading with KiddiBooks!
                </h1>
                <p class="text-xl mb-6">
                    Explore our collection of educational e-books designed especially
                    for young minds.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="bg-white text-primary px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">Browse
                        Books</a>
                    <a href="#"
                        class="bg-secondary text-dark px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">Learn
                        More</a>
                </div>
            </div>
            <div class="md:w-1/2" data-aos="fade-left" data-aos-delay="200">
                <img src="b.png" alt="Children reading books" class="" />
            </div>
        </div>
    </div>
</section>
<!-- Promo Section -->
<section id="promo" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold">Special Promotions</h2>
            <div class="bg-primary text-white px-4 py-2 rounded-full font-bold animate-pulse">
                Limited Time Offers!
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($promotions as $promo)
                @if (isset($promo->product))
                <a href="{{ route('item-detail', ['slug' => $promo->product->slug]) }}"
                    class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">


                        <div class="relative">
                            <img src="{{ $promo->product->image ? asset('storage/' . $promo->product->image) : asset('/placeholder.svg?height=150&width=250') }}"
                                alt="{{ $promo->product->name }}" class="w-full h-48 object-cover" />
                            <div class="absolute top-0 right-0 bg-secondary rounded-bl-lg text-white text-sm font-bold px-3 py-1">
                                {{ $promo->discount_type == 'percentage' ? $promo->discount_value . '% OFF' : 'Rp ' . number_format($promo->discount_value, 0, ',', '.') . ' OFF' }}
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                                PROMO
                            </div>
                        </div>
                        <div class="p-2">
                            <h3 class="text-lg font-bold mb-2">{{ $promo->product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                {{ Str::limit($promo->product->description ?? 'No description available.', 50, '...') }}
                            </p>

                            <div class="">
                                <div>
                                    @php
                                        $originalPrice = $promo->product->harga;
                                        $discountedPrice =
                                            $promo->discount_type === 'percentage'
                                                ? $originalPrice - $originalPrice * ($promo->discount_value / 100)
                                                : max($originalPrice - $promo->discount_value, 0);
                                    @endphp
                                  <div class="flex justify-between">
                                    <span class="text-gray-400 line-through text-sm">Rp.
                                        {{ number_format($originalPrice, 0, ',', '.') }}
                                    </span>
                                    <span class="text-primary font-bold">Rp.
                                        {{ number_format($discountedPrice, 0, ',', '.') }}
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>


        <div class="text-center mt-8">
            <a href="{{ route('all.products.promo') }}"
                class="bg-dark text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">
                View All Promotions
            </a>
        </div>
    </div>
</section>


<!-- Categories Section -->
<section id="categories" class="py-16 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-down">Explore Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($categories as $index => $category)
                @php
                    $colors = [
                        ['bg' => 'bg-blue-100', 'icon' => 'bg-blue-500', 'text' => 'text-blue-500'],
                        ['bg' => 'bg-green-100', 'icon' => 'bg-green-500', 'text' => 'text-green-500'],
                        ['bg' => 'bg-red-100', 'icon' => 'bg-red-500', 'text' => 'text-red-500'],
                        ['bg' => 'bg-purple-100', 'icon' => 'bg-purple-500', 'text' => 'text-purple-500'],
                        ['bg' => 'bg-yellow-100', 'icon' => 'bg-yellow-500', 'text' => 'text-yellow-500']
                    ];
                    $color = $colors[$index % count($colors)];
                @endphp
                <div class="category-card {{ $color['bg'] }} rounded-xl p-6 text-center transition duration-300 shadow-md"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="{{ $color['icon'] }} w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        {!! $category->icon ?? '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7" />
                        </svg>' !!}
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                    <a href="{{ $category->link }}" class="font-bold hover:underline {{ $color['text'] }}">
                        Explore {{ $category->name }} →
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Featured Products Section -->
<section id="products" class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4" data-aos="fade-down">Featured E-Books</h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto" data-aos="fade-down" data-aos-delay="100">
            Discover our most popular educational e-books that children love and parents trust.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                @php
                    // Periksa apakah produk ada dalam daftar promo
                    $isPromo = $promotions->contains('product_id', $product->id);
                @endphp

                @if (!$isPromo)
                    <!-- Hanya tampilkan produk yang tidak masuk dalam promosi -->
                    <a href="{{ route('item-detail', ['slug' => $product->slug]) }}"
                        class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300"
                        data-aos="zoom-in" data-aos-delay="100">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ $product->category->name ?? 'Category' }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                {{ Str::limit($product->description ?? 'No description available.', 50, '...') }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('all-product') }}"
                class="bg-dark text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">
                View All E-Books
            </a>
        </div>
    </div>
</section>



<!-- Testimonials -->
<section class="py-16 bg-gray-50"data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-down">What Parents & Teachers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                        S</div>
                    <div class="ml-4">
                        <h4 class="font-bold">Sarah Johnson</h4>
                        <p class="text-gray-600 text-sm">Parent of two</p>
                    </div>
                </div>
                <p class="text-gray-700">"My kids love the STEAM books! The interactive elements keep them engaged
                    while learning important concepts. Highly recommended!"</p>
                <div class="flex text-yellow-400 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md"data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center text-white font-bold text-xl">
                        M</div>
                    <div class="ml-4">
                        <h4 class="font-bold">Michael Chen</h4>
                        <p class="text-gray-600 text-sm">English Teacher</p>
                    </div>
                </div>
                <p class="text-gray-700">"The IELTS and TOEFL preparation books are excellent resources for my
                    students. The content is age-appropriate and engaging while being academically rigorous."</p>
                <div class="flex text-yellow-400 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md"data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-accent rounded-full flex items-center justify-center text-white font-bold text-xl">
                        A</div>
                    <div class="ml-4">
                        <h4 class="font-bold">Amanda Rodriguez</h4>
                        <p class="text-gray-600 text-sm">Homeschool Parent</p>
                    </div>
                </div>
                <p class="text-gray-700">"KiddiBooks has been a game-changer for our homeschooling journey. The variety
                    of subjects and the quality of content is outstanding. Worth every penny!"</p>
                <div class="flex text-yellow-400 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-16" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-primary rounded-lg shadow-lg p-10 text-center" data-aos="zoom-in">
            <h2 class="text-3xl font-bold text-black mb-4">Join Our Newsletter</h2>
            <p class="text-white opacity-90 mb-8">
                Stay updated with new releases, special offers, and educational tips for your children.
            </p>
            <form class="flex flex-col sm:flex-row gap-2">
                <input type="email" placeholder="Your email address"
                    class="flex-grow px-4 py-3 rounded-full border border-gray-300 focus:outline-none">
                <button type="submit"
                    class="bg-dark text-white font-bold px-6 py-3 rounded-full hover:bg-opacity-90 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
