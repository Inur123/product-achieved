@extends('frontend.layouts.app')

@section('title', $class->title)

@section('content')
    <!-- Simplified Header Section -->
    <section class="bg-gradient-to-r from-primary to-secondary py-16 pt-24" id="class-header" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center">
                <div class="w-full md:w-3/4 lg:w-2/3 text-center">
                    <h1 class="text-4xl text-white md:text-5xl font-extrabold mb-4">{{ $class->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="py-16 md:py-24 bg-white" id="class-description">
        <div class="container mx-auto px-4">
            <div class="animate-fadeInLeft">
                <div class="w-full lg:w-2/3 mx-auto">
                    <h2 class="text-2xl font-bold mb-4">About This Class</h2>
                    <div class="w-24 h-1 bg-primary mb-6"></div>
                    <p class="text-gray-600 mb-6 text-lg">
                        {!! $class->description !!}
                    </p>
                    <div class="flex space-x-4 mt-8">
                        <a href="https://wa.me/6281392707655"
                           class="bg-primary text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">
                            Enroll Now
                        </a>
                        <a href="{{ route('home') }}"
                           class="border border-primary text-primary px-6 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition">
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
