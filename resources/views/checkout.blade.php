@extends('frontend.layouts.app')

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
        padding-top: 70px;
    }
    .gradient-bg {
        background: linear-gradient(90deg, #2A6B96 0%, #5AA7D4 100%);
    }
</style>
    <!-- Checkout Header -->
    <div class="gradient-bg py-12 text-center text-white">
        <h1 class="text-3xl font-bold mb-2">Checkout</h1>
        <p>Complete your purchase and start learning!</p>
    </div>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Cart Items -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-6">Your Cart</h2>

                <!-- Cart Item 1 -->
                <div class="flex items-start space-x-4 pb-6 border-b">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg">
                        <img src="/placeholder.svg?height=96&width=96" alt="IELTS Junior Prep" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">IELTS Junior Prep</h3>
                        <p class="text-gray-600 text-sm">Fun exercises to prepare children for IELTS exams.</p>
                        <div class="inline-block px-2 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded mt-2">
                            IELTS
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-primary font-semibold">$12.99</p>
                        <button class="text-red-500 text-sm mt-0 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="flex items-start space-x-4 py-6 border-b">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg">
                        <img src="/placeholder.svg?height=96&width=96" alt="Science Experiments at Home" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Science Experiments at Home</h3>
                        <p class="text-gray-600 text-sm">50 safe and fun experiments kids can do at home.</p>
                        <div class="inline-block px-2 py-1 bg-green-100 text-green-600 text-xs font-medium rounded mt-2">
                            STEAM
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-primary font-semibold">$9.99</p>
                        <button class="text-red-500 text-sm mt-0 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </div>
                </div>

                <!-- Cart Item 3 -->
                <div class="flex items-start space-x-4 pt-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg">
                        <img src="/placeholder.svg?height=96&width=96" alt="Math Adventures" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Math Adventures</h3>
                        <p class="text-gray-600 text-sm">Making math fun through stories and puzzles.</p>
                        <div class="inline-block px-2 py-1 bg-red-100 text-red-600 text-xs font-medium rounded mt-2">
                            PROMO
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex flex-col items-end">
                            <span class="text-gray-400 line-through text-sm">$14.99</span>
                            <span class="text-primary font-semibold">$7.49</span>
                        </div>
                        <button class="text-red-500 text-sm mt-0 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-6">Customer Information</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" placeholder="Enter your full name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" placeholder="Enter your email address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                            <input type="tel" placeholder="Enter your WhatsApp number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Pembayaran</label>
                            <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea placeholder="Enter your complete address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-6">Order Summary</h2>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">$30.47</span>
                    </div>
                    <div class="flex justify-between text-green-500">
                        <span>Discount</span>
                        <span>-$7.50</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-medium">$2.30</span>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between">
                            <span class="font-bold">Total</span>
                            <span class="font-bold text-primary">$25.27</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Coupon Code</label>
                    <div class="flex space-x-2">
                        <input type="text" placeholder="Enter coupon code" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium">
                            Apply
                        </button>
                    </div>
                </div>


                <button class="w-full bg-primary text-white py-3 rounded-lg font-medium mt-6">
                    Complete Purchase
                </button>

                <p class="text-sm text-gray-500 text-center mt-4">
                    By completing your purchase, you agree to our
                    <a href="#" class="text-primary">Terms of Service</a> and
                    <a href="#" class="text-primary">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </div>
