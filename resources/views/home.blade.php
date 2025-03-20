@extends('frontend.layouts.app')

@section('title', 'home')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-secondary py-16 pt-24" id="hero" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl text-white md:text-5xl font-extrabold mb-4">Unlock Your Potential Skills With Us</h1>
                    <p class="text-xl text-white mb-6">Let's create a better educational global community</p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="bg-white text-primary px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">Browse
                            Books</a>
                        <a href="#"
                            class="bg-accent text-dark px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">Learn
                            More</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/landingpage.png') }}" alt="Children reading books">
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="py-16 md:py-24 bg-white" id="about">
        <div class="mx-auto px-4">
            <div class="animate-fade-in-right">
                <div class="flex flex-wrap flex-row-reverse">
                    <div class="w-full lg:w-1/2 self-center">
                        <div class="mb-8">
                            <h4 class="text-3xl font-bold mb-4">About <em class="text-primary">What We Do</em> &amp; Who
                                We Are</h4>
                            <div class="w-24 h-1 bg-primary mb-6"></div>
                        </div>
                        <div class="mb-8">
                            <div class="w-full">
                                <p class="text-gray-600 mb-6">
                                    In this era of rapid globalization, abilities and skills are key to success in all
                                    aspects of life. However, many individuals still struggle to achieve the required
                                    proficiency, whether to continue their studies abroad, pursue a career in a
                                    multinational company, or simply improve their job prospects.
                                </p>
                                <p class="text-gray-600">
                                    Seeing the urgent need for effective and efficient learning solutions, following the
                                    development of STEM, Achieved.id is the answer. Achieved.id is committed to helping
                                    each individual reach their full potential through quality STEM and language support
                                    programs that are tailored to their individual needs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="flex justify-center lg:justify-end">
                            <img src="{{ asset('images/belajar.png') }}" alt="Learning" class="h-90 w-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Program Section -->
    <div id="program" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="animate-fade-in-left">
                <div class="w-full lg:w-2/3 mx-auto mb-12 text-center">
                    <div class="mb-8">
                        <h4 class="text-3xl font-bold mb-4">We Have The <em class="text-primary">Best</em> Program</h4>
                        <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                        <p class="text-gray-600">
                            Achieved.id is an educational technology platform that uses Problem base learning and
                            Project base learning methods and implements 4C (Creativity, Communication, Critical
                            Thinking and Collaboration)
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <!-- Language Card -->
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div
                            class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <img src="{{ asset('images/language.png') }}" alt="Language" class="w-8 h-8">
                                </div>
                                <h4 class="text-xl font-bold mb-4">Language</h4>
                            </div>
                            <div class="flex-grow">
                                <p class="text-gray-600 text-center mb-6">
                                    We provide Coaching Scholarship, IELTS Academic and General Training, English and
                                    Arabic learning for kids
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="#program-ielts"
                                    class="inline-block border border-primary text-primary hover:bg-primary hover:text-white px-6 py-2 rounded-md transition-colors duration-300">
                                    Click For Details !
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Coding Card -->
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div
                            class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <img src="{{ asset('images/coding.png') }}" alt="Coding" class="w-8 h-8">
                                </div>
                                <h4 class="text-xl font-bold mb-4">Coding</h4>
                            </div>
                            <div class="flex-grow">
                                <p class="text-gray-600 text-center mb-6">
                                    We use the learning media (Scratch and Tynker) with AI for kids and web programming
                                    for adults
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="https://wa.me/6285287474727"
                                    class="inline-block border border-primary text-primary hover:bg-primary hover:text-white px-6 py-2 rounded-md transition-colors duration-300">
                                    Click For Details !
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- IoT Card -->
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div
                            class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <img src="{{ asset('images/iot.png') }}" alt="IoT" class="w-8 h-8">
                                </div>
                                <h4 class="text-xl font-bold mb-4">Internet of Things</h4>
                            </div>
                            <div class="flex-grow">
                                <p class="text-gray-600 text-center mb-6">
                                    Study the application of IoT in industry to increase efficiency and productivity in
                                    the industrial era 4.0
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="https://wa.me/6285287474727"
                                    class="inline-block border border-primary text-primary hover:bg-primary hover:text-white px-6 py-2 rounded-md transition-colors duration-300">
                                    Click For Details !
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- IELTS Program Section -->
    <div id="program-ielts" class="bg-gradient-to-r from-primary_program to-secondary_program py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-7/12 flex justify-center">
                    <div class="animate-fadeInLeft">
                        <img class="w-full h-auto" src="{{ asset('images/ielts-program.png') }}" alt="IELTS Program" />
                    </div>
                </div>
                <div class="lg:w-5/12">
                    <div class="animate-fadeInLeft">
                        <div class="text-center h-full lg:text-left">
                            <div class="flex h-full">
                                <div class="w-full my-auto">
                                    <h4 class="text-2xl font-bold mb-3">IELTS Program</h4>
                                    <h5 class="text-lg text-black mb-4">
                                        We help you gain confidence and improve your IELTS Listening, Reading, Writing
                                        and Speaking.
                                    </h5>
                                    <br>
                                    <ul class="space-y-2 mb-6 text-left">
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Practice in small group classes and private one on one classes.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Customise your timetable, Choose classes based on your goals and
                                                interests.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Choose your level. From beginner to advanced.</span>
                                        </li>
                                    </ul>
                                    <div class="gradient-button">
                                        <a href="#program-ielts-sub"
                                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:-translate-y-1 hover:shadow-lg">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- IELTS Program Sub Section -->
            <div id="program-ielts-sub" class="mt-16 flex flex-col lg:flex-row gap-8">
                <div class="lg:w-5/12 order-2 lg:order-1">
                    <div class="animate-fadeInLeft">
                        <div class="text-left h-full">
                            <div class="flex h-full">
                                <div class="w-full my-auto">
                                    <h5 class="text-xl font-bold mb-4">Benefits:</h5>
                                    <br>
                                    <ul class="space-y-2 mb-6">
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>Guided by experienced tutors</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>Get learning modules and videos</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>Interactive Class</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>Free scoring</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>Limited only 7 students</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>60 minutes/meeting</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">⤷</span>
                                            <span>40 total meetings for all skills</span>
                                        </li>
                                    </ul>
                                    <div class="gradient-button">
                                        <a href="https://wa.me/6281392707655"
                                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:-translate-y-1 hover:shadow-lg">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-7/12 order-1 lg:order-2">
                    <div class="animate-fadeInLeft">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Silver Plan -->
                            <div
                                class="bg-gradient-to-r from-secondary_program to-primary_program p-6 rounded-lg shadow-md">
                                <span class="font-bold text-blue-500 text-lg">Silver</span>
                                <br>
                                <h6 class="text-base font-semibold mt-2">3 Months Class</h6>
                                <p class="mt-2 text-gray-700">
                                    40 Total Meetings for All Skills
                                    <br>
                                    3x meetings weekly
                                    <br>
                                    Start From IDR. 200K
                                </p>
                            </div>

                            <!-- Gold Plan -->
                            <div
                                class="bg-gradient-to-r from-secondary_program to-primary_program p-6 rounded-lg shadow-md">
                                <span class="font-bold text-blue-500 text-lg">Gold</span>
                                <br>
                                <h6 class="text-base font-semibold mt-2">2 Months Class</h6>
                                <p class="mt-2 text-gray-700">
                                    40 Total Meetings for All Skills
                                    <br>
                                    5x meetings weekly
                                    <br>
                                    Start From IDR. 300K
                                </p>
                            </div>

                            <!-- Platinum Plan -->
                            <div
                                class="bg-gradient-to-r from-secondary_program to-primary_program p-6 rounded-lg shadow-md">
                                <span class="font-bold text-blue-500 text-lg">Platinum</span>
                                <br>
                                <h6 class="text-base font-semibold mt-2">A Month Class</h6>
                                <p class="mt-2 text-gray-700">
                                    40 Total Meetings for All Skills
                                    <br>
                                    10x meetings weekly
                                    <br>
                                    Start From IDR. 400K
                                </p>
                            </div>
                        </div>

                        <!-- Private Plan -->
                        <div
                            class="bg-gradient-to-r from-secondary_program to-primary_program p-6 rounded-lg shadow-md mt-4">
                            <div class="flex flex-col md:flex-row">
                                <div class="md:w-1/2">
                                    <span class="font-bold text-blue-500 text-lg">Private</span>
                                    <br>
                                    <h6 class="text-base font-semibold mt-2">A Month Class</h6>
                                    <p class="mt-2 text-gray-700">
                                        40 Total Meetings for All Skills
                                        <br>
                                        10x meetings weekly
                                        <br>
                                        Start From IDR. 600K
                                    </p>
                                </div>
                                <div class="md:w-1/2 mt-4 md:mt-0">
                                    <ul class="space-y-1">
                                        <li class="text-gray-700">Guided by experienced tutors</li>
                                        <li class="text-gray-700">Get learning modules and videos</li>
                                        <li class="text-gray-700">Interactive Class</li>
                                        <li class="text-gray-700">Free scoring</li>
                                        <li class="text-gray-700">Limited only 7 students</li>
                                        <li class="text-gray-700">60 minutes/meeting</li>
                                        <li class="text-gray-700">40 total meetings for all skills</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Coding for Kids Section -->
    <div id="program-coding-kids" class="bg-gradient-to-r from-secondary_program to-primary_program py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-7/12 flex justify-center">
                    <div class="animate-fadeInLeft">
                        <img class="w-full h-auto" src="{{ asset('images/coding-for-kids-program.png') }}"
                            alt="Coding for Kids Program" />
                    </div>
                </div>
                <div class="lg:w-5/12">
                    <div class="animate-fadeInLeft">
                        <div class="text-center h-full lg:text-left">
                            <div class="flex h-full">
                                <div class="w-full my-auto">
                                    <h4 class="text-2xl font-bold mb-3">Coding for Kids</h4>
                                    <h5 class="text-lg text-black mb-4">
                                        Kami membantu buah hati ayah dan bunda untuk mengenal teknologi melalui
                                        pembelajaran coding yang menyenangkan.
                                    </h5>
                                    <br>
                                    <ul class="space-y-2 mb-6 text-left">
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Belajar Scratch dalam kelas kecil yang interaktif.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Melatih menyelesaikan masalah secara logis dan sistematis.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Pembelajaran berbasis 4C (Creativity, Critical Thinking, Communication
                                                and Collaboration).</span>
                                        </li>
                                    </ul>
                                    <div class="gradient-button">
                                        <a href="#program-ielts-sub"
                                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:-translate-y-1 hover:shadow-lg">
                                            Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language for Kids Section -->
    <div id="program-language-kids" class="bg-gradient-to-r from-primary_program to-secondary_program py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-7/12 order-1 lg:order-2">
                    <div class="animate-fadeInLeft">
                        <div class="right-image">
                            <img class="w-full h-auto" src="{{ asset('images/language-kids.png') }}" alt="Language for Kids" />
                        </div>
                    </div>
                </div>
                <div class="lg:w-5/12 order-2 lg:order-1">
                    <div class="animate-fadeInLeft">
                        <div class="text-left h-full">
                            <div class="flex h-full">
                                <div class="w-full my-auto">
                                    <h4 class="text-2xl font-bold mb-3">Language for Kids</h4>
                                    <br>
                                    <h5 class="text-lg text-black mb-4">
                                        Kami membantu buah hati ayah dan bunda untuk mengenal dan belajar bahasa asing.
                                    </h5>
                                    <br>
                                    <ul class="space-y-2 mb-6">
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Belajar English atau Arabic dalam kelas kecil yang interaktif.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Melatih berbicara, mendengar, membaca dan menulis.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="mr-2">→</span>
                                            <span>Pembelajaran berbasis 4C (Creativity, Critical Thinking, Communication
                                                and Collaboration).</span>
                                        </li>
                                    </ul>
                                    <div class="gradient-button">
                                        <a href="https://wa.me/6281392707655"
                                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:-translate-y-1 hover:shadow-lg">
                                            Daftar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Promo Section -->
    <section id="promo" class="py-16 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold">Special Promotions</h2>
                <div class="bg-primary text-white px-4 py-2 rounded-full font-bold animate-pulse">
                    Limited Time Offers!
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-right" data-aos-delay="100">
                @foreach ($promotions as $promo)
                    @if (isset($promo->product) && $promo->status === 'active')
                        <!-- Check if the promo is active -->
                        <a href="{{ route('item-detail', ['slug' => $promo->product->slug]) }}"
                            class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">

                            <div class="relative">
                                <img src="{{ $promo->product->image ? asset('storage/' . $promo->product->image) : asset('/placeholder.svg?height=150&width=250') }}"
                                    alt="{{ $promo->product->name }}" class="w-full h-48 object-cover" />
                                <div
                                    class="absolute top-0 right-0 bg-secondary rounded-bl-lg text-white text-sm font-bold px-3 py-1">
                                    {{ $promo->discount_type == 'percentage' ? $promo->discount_value . '% OFF' : 'Rp ' . number_format($promo->discount_value, 0, ',', '.') . ' OFF' }}
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                                    PROMO
                                </div>
                            </div>
                            <div class="p-2">
                                <h3 class="text-lg font-bold mb-2">{{ $promo->product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3">
                                    {{ Str::limit($promo->product->description ?? 'No description available.', 50, '...') }}
                                </p>

                                <div class="">
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
                        </a>
                    @endif
                @endforeach

            </div>


            <div class="text-center mt-8" data-aos="fade-up">
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
                @foreach ($categories as $index => $category)
                    @php
                        $colors = [
                            ['bg' => 'bg-blue-100', 'icon' => 'bg-blue-500', 'text' => 'text-blue-500'],
                            ['bg' => 'bg-green-100', 'icon' => 'bg-green-500', 'text' => 'text-green-500'],
                            ['bg' => 'bg-red-100', 'icon' => 'bg-red-500', 'text' => 'text-red-500'],
                            ['bg' => 'bg-purple-100', 'icon' => 'bg-purple-500', 'text' => 'text-purple-500'],
                            ['bg' => 'bg-yellow-100', 'icon' => 'bg-yellow-500', 'text' => 'text-yellow-500'],
                        ];
                        $color = $colors[$index % count($colors)];
                    @endphp
                    <div class="category-card {{ $color['bg'] }} rounded-xl p-6 text-center transition duration-300 shadow-md"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div
                            class="{{ $color['icon'] }} w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            {!! $category->icon ??
                                '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M5 12h14M12 5l7 7-7 7" />
                                                                                </svg>' !!}
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $category->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                        <a href="{{ route('category.products', ['slug' => $category->slug]) }}"
                            class="font-bold hover:underline {{ $color['text'] }}">
                            Explore {{ $category->name }} →
                        </a>

                        {{-- <a href="{{ route('category.products', ['slug' => $category->slug]) }}">
                        {{ $category->name }}
                    </a> --}}
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
                        // Periksa apakah produk ada dalam daftar promo aktif
                        $promo = $promotions->firstWhere('product_id', $product->id);
                        $isPromoActive =
                            $promo &&
                            $promo->status === 'active' &&
                            now()->lt(\Carbon\Carbon::parse($promo->expiry_date));
                    @endphp

                    <a href="{{ route('item-detail', ['slug' => $product->slug]) }}"
                        class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300"
                        data-aos="zoom-in" data-aos-delay="100">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover">
                            <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ $product->category->name ?? 'Category' }}
                            </div>

                            @if ($isPromoActive)
                                <div
                                    class="absolute bottom-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
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
                                @if ($isPromoActive)
                                    @php
                                        // If there's a promo, calculate the discounted price
$originalPrice = $product->harga;
$discountedPrice =
    $promo->discount_type === 'percentage'
                                                ? $originalPrice - $originalPrice * ($promo->discount_value / 100)
                                                : max($originalPrice - $promo->discount_value, 0);
                                    @endphp
                                    <span class="text-gray-400 line-through text-sm">Rp
                                        {{ number_format($originalPrice, 0, ',', '.') }}</span>
                                    <span class="text-primary font-bold">Rp
                                        {{ number_format($discountedPrice, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-primary font-bold">Rp
                                        {{ number_format($product->harga, 0, ',', '.') }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
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
   <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">What Parents & Teachers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
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

            <div class="bg-white p-6 rounded-lg shadow-md">
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

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-accent rounded-full flex items-center justify-center text-white font-bold text-xl">
                        A</div>
                    <div class="ml-4">
                        <h4 class="font-bold">Amanda Rodriguez</h4>
                        <p class="text-gray-600 text-sm">Homeschool Parent</p>
                    </div>
                </div>
                <p class="text-gray-700">"KiddiBooks has been a game-changer for our homeschooling journey. The
                    variety of subjects and the quality of content is outstanding. Worth every penny!"</p>
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
     <section class="py-16 bg-primary">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Join Our Newsletter</h2>
                <p class="text-white opacity-90 mb-8">Stay updated with new releases, special offers, and educational
                    tips for your children.</p>
                <form class="flex flex-col sm:flex-row gap-2">
                    <input type="email" placeholder="Your email address"
                        class="flex-grow px-4 py-3 rounded-full focus:outline-none">
                    <button type="submit"
                        class="bg-accent text-dark font-bold px-6 py-3 rounded-full hover:bg-opacity-90 transition">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
@endsection
