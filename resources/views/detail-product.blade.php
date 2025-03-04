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
    <!-- Product Detail Header -->
    <div class="gradient-bg py-12 text-center text-white">
        <h1 class="text-3xl font-bold mb-2">Product Detail</h1>
        <p>Explore the details of this amazing product!</p>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column - Product Image -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <img src="1.jpeg" alt="IELTS Junior Prep" class="w-full h-auto rounded-lg">
        </div>

        <!-- Right Column - Product Details -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold mb-4 text-dark">IELTS Junior Prep</h2>
            <div class="inline-block px-2 py-1 bg-secondary bg-opacity-10 text-primary text-xs font-medium rounded mb-4">
                IELTS
            </div>
            <p class="text-gray-600 mb-6">Fun exercises to prepare children for IELTS exams. This book is designed to make learning enjoyable and effective for young learners.</p>
            <p class="text-primary font-semibold text-2xl mb-6">$12.99</p>

            <!-- Add to Cart Button -->
            <button class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
                Add to Cart
            </button>

            <!-- Additional Information -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-dark mb-2">Additional Information</h3>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Pages: 200</li>
                    <li>Language: English</li>
                    <li>Publisher: Achieved.id</li>
                    <li>ISBN: 978-3-16-148410-0</li>
                </ul>
            </div>
        </div>
    </div>
