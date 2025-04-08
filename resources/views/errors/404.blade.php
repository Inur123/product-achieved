@extends('frontend.layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800">404</h1>
            <p class="text-2xl text-gray-600 mt-4">Oops! Page not found.</p>
            <p class="text-gray-500 mt-2">The page you are looking for might have been removed or is temporarily unavailable.</p>
            <a href="{{ url('/') }}" class="mt-6 inline-block bg-primary text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition">
                Go Back Home
            </a>
        </div>
    </div>
@endsection
