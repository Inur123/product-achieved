@extends('frontend.layouts.app')


<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-secondary py-16 pt-24" id="hero">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-white mb-8 md:mb-0">
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
            <div class="md:w-1/2">
                <img src="1.jpeg" alt="Children reading books"
                    class="rounded-lg shadow-xl" />
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
            <!-- Promo Book 1 -->
            <div
                class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">
                <div class="relative">
                    <img src="1.jpeg" alt="Math Adventures" class="w-full h-48 object-cover" />
                    <div
                        class="absolute top-0 right-0 bg-secondary rounded-bl-lg text-white text-sm font-bold px-3 py-1">
                        50% OFF
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                        FLASH SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Making math fun through stories and puzzles.
                    </p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-400 line-through text-sm">$14.99</span>
                            <span class="text-primary font-bold ml-1">$7.49</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Promo Book 2 -->
            <div
                class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">
                <div class="relative">
                    <img src="1.jpeg" alt="Math Adventures" class="w-full h-48 object-cover" />
                    <div
                        class="absolute top-0 right-0 bg-secondary rounded-bl-lg  text-white text-sm font-bold px-3 py-1">
                        50% OFF
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                        FLASH SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Making math fun through stories and puzzles.
                    </p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-400 line-through text-sm">$14.99</span>
                            <span class="text-primary font-bold ml-1">$7.49</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Promo Book 3 -->
            <div
                class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">
                <div class="relative">
                    <img src="1.jpeg" alt="Math Adventures" class="w-full h-48 object-cover" />
                    <div
                        class="absolute top-0 right-0 bg-secondary rounded-bl-lg  text-white text-sm font-bold px-3 py-1">
                        50% OFF
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                        FLASH SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Making math fun through stories and puzzles.
                    </p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-400 line-through text-sm">$14.99</span>
                            <span class="text-primary font-bold ml-1">$7.49</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Promo Book 4 -->
            <div
                class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-primary">
                <div class="relative">
                    <img src="1.jpeg" alt="Math Adventures" class="w-full h-48 object-cover" />
                    <div
                        class="absolute top-0 right-0 bg-secondary rounded-bl-lg  text-white text-sm font-bold px-3 py-1">
                        50% OFF
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-secondary bg-opacity-80 text-white py-2 px-3 font-bold">
                        FLASH SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Making math fun through stories and puzzles.
                    </p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-400 line-through text-sm">$14.99</span>
                            <span class="text-primary font-bold ml-1">$7.49</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="#"
                class="bg-dark text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">View
                All Promotions</a>
        </div>
    </div>
</section>
<!-- Categories Section -->
<section id="categories" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Explore Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <!-- IELTS Category -->
            <div class="category-card bg-blue-100 rounded-xl p-6 text-center transition duration-300 shadow-md">
                <div class="bg-blue-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">IELTS</h3>
                <p class="text-gray-600 mb-4">Prepare your child for international English tests with fun learning
                    materials.</p>
                <a href="#" class="text-blue-500 font-bold hover:underline">Explore IELTS Books →</a>
            </div>

            <!-- STEAM Kids Category -->
            <div class="category-card bg-green-100 rounded-xl p-6 text-center transition duration-300 shadow-md">
                <div class="bg-green-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">STEAM Kids</h3>
                <p class="text-gray-600 mb-4">Science, Technology, Engineering, Arts, and Math books for curious minds.
                </p>
                <a href="#" class="text-green-500 font-bold hover:underline">Explore STEAM Books →</a>
            </div>

            <!-- Promo Category -->
            <div class="category-card bg-red-100 rounded-xl p-6 text-center transition duration-300 shadow-md">
                <div class="bg-red-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Promo</h3>
                <p class="text-gray-600 mb-4">Special offers and discounted e-books for a limited time. Don't miss out!
                </p>
                <a href="#" class="text-red-500 font-bold hover:underline">See Promotions →</a>
            </div>

            <!-- TOEFL Category -->
            <div class="category-card bg-purple-100 rounded-xl p-6 text-center transition duration-300 shadow-md">
                <div class="bg-purple-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">TOEFL</h3>
                <p class="text-gray-600 mb-4">Help your child excel in TOEFL with our engaging preparation materials.
                </p>
                <a href="#" class="text-purple-500 font-bold hover:underline">Explore TOEFL Books →</a>
            </div>

            <!-- All Books Category -->
            <div class="category-card bg-yellow-100 rounded-xl p-6 text-center transition duration-300 shadow-md">
                <div class="bg-yellow-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2  2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">All Books</h3>
                <p class="text-gray-600 mb-4">Browse our complete collection of children's educational e-books.</p>
                <a href="#" class="text-yellow-600 font-bold hover:underline">View All Books →</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="products" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">Featured E-Books</h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Discover our most popular educational e-books that
            children love and parents trust.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Book 1 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="IELTS Junior Prep"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                        IELTS</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">IELTS Junior Prep</h3>
                    <p class="text-gray-600 text-sm mb-3">Fun exercises to prepare children for IELTS exams.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$12.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 2 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="Science Experiments at Home"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                        STEAM</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Science Experiments at Home</h3>
                    <p class="text-gray-600 text-sm mb-3">50 safe and fun experiments kids can do at home.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$9.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="TOEFL Vocabulary Builder"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded">
                        TOEFL</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">TOEFL Vocabulary Builder</h3>
                    <p class="text-gray-600 text-sm mb-3">Expand your child's vocabulary for TOEFL success.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$10.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 4 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="Art & Craft Projects"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                        STEAM</div>
                    <div class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Art & Craft Projects</h3>
                    <p class="text-gray-600 text-sm mb-3">Creative projects using materials found at home.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$9.49</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 5 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="Coding for Kids"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                        STEAM</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Coding for Kids</h3>
                    <p class="text-gray-600 text-sm mb-3">Introduction to programming concepts for children.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$13.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 6 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="English Grammar Fun"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                        IELTS</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">English Grammar Fun</h3>
                    <p class="text-gray-600 text-sm mb-3">Learn grammar through games and activities.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$8.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 7 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="Math Adventures"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                        STEAM</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                    <p class="text-gray-600 text-sm mb-3">Making math fun through stories and puzzles.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$11.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>

            <!-- Book 8 -->
            <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative">
                    <img src="1.jpeg" alt="TOEFL Junior Guide"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded">
                        TOEFL</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">TOEFL Junior Guide</h3>
                    <p class="text-gray-600 text-sm mb-3">Complete preparation for the TOEFL Junior test.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-bold">$11.99</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add to
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#"
                class="bg-dark text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">View
                All E-Books</a>
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
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-primary rounded-lg shadow-lg p-10 text-center">
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

