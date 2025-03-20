<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achieved.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0183b0',
                        secondary: '#ffffff',
                        accent: '#FFD166',
                        dark: '#2A2A2A',
                        light: '#F7F7F7',
                        primary_program: '#dceefd',
                        secondary_program: '#ffffff'
                    },
                    fontFamily: {
                        sans: ['Nunito', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 23px;
            left: 2px
        }
        .bg-section-top {
            background-image: url(images/regular-table-top.png);
            background-position: top left;
            background-repeat: no-repeat;
        }

        .bg-section-bottom {
            background-image: url(images/regular-table-top-reverse.png);
            background-position: bottom left;
            background-repeat: no-repeat;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .book-card:hover {
            transform: scale(1.03);
        }

        /* Mobile menu animation */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Animation classes */
        .animate-fadeInLeft {
            animation: fadeInLeft 0.9s ease-out forwards;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Gradient button */
        .gradient-button a {
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            display: inline-block;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .gradient-button a:hover {
            background: linear-gradient(to right, #2563eb, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Box item styling */
        .box-item {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 1rem;
        }

        .box-item span {
            font-weight: 700;
            color: #3b82f6;
            font-size: 1.125rem;
        }

        /* Preloader styles */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #EFF6FF, #DBEAFE);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeOut 1s ease-in-out 3s forwards;
            /* Animation to hide preloader after 3 seconds */
        }

        /* Main content initially hidden */
        .main-content {
            opacity: 0;
            animation: fadeIn 1s ease-in-out 3s forwards;
            /* Animation to show content after 3 seconds */
        }

        /* Logo pulse animation */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(0.95);
            }
        }

        .animate-pulse-slow {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Spinner animation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin 1.5s linear infinite;
        }

        /* Loading dots animation */
        @keyframes dots {

            0%,
            20% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .dot-1 {
            animation: dots 1.4s infinite 0.2s;
        }

        .dot-2 {
            animation: dots 1.4s infinite 0.4s;
        }

        .dot-3 {
            animation: dots 1.4s infinite 0.6s;
        }

        /* Progress bar animation */
        @keyframes progress {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            75% {
                width: 85%;
            }

            90% {
                width: 90%;
            }

            100% {
                width: 95%;
            }
        }

        /* Fade animations for preloader and main content */
        @keyframes fadeOut {
            from {
                opacity: 1;
                visibility: visible;
            }

            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- Preloader -->
    <div class="preloader">
        <div class="flex flex-col items-center justify-center p-8 max-w-md w-full">
            <!-- Logo Container -->
            <div class="mb-8 animate-pulse-slow">
                <!-- Replace with your actual logo -->
                <div class="p-6">
                    <img src="images/watermark.png" class="max-w-32" alt="Chain App Dev">
                </div>
            </div>

            <!-- Spinner -->
            <div class="relative mb-6">
                <div class="w-16 h-16 border-4 border-blue-200 border-t-blue-500 rounded-full animate-spin-slow"></div>
            </div>

            <!-- Loading Text -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-blue-800 mb-2">Loading</h2>
                <div class="flex justify-center items-center">
                    <span class="text-blue-600 text-lg">Tunggu Sebentar</span>
                    <span class="dot-1 text-blue-600 text-lg ml-1">.</span>
                    <span class="dot-2 text-blue-600 text-lg">.</span>
                    <span class="dot-3 text-blue-600 text-lg">.</span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="w-full mt-8 bg-gray-200 rounded-full h-2.5 overflow-hidden">
                <div class="bg-blue-600 h-2.5 rounded-full" style="animation: progress 3s ease-in-out infinite;"></div>
            </div>
        </div>
    </div>


    <!-- Header -->
    <header class="bg-white shadow-md relative z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-3xl font-extrabold text-primary">
                        <a href="index.php" class="logo">
                            <img src="images/logo.png" alt="Chain App Dev">
                        </a>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-dark hover:text-primary font-semibold">Home</a>
                    <a href="#promo" class="text-dark hover:text-primary font-semibold">Promo</a>
                    <a href="#categories" class="text-dark hover:text-primary font-semibold">Categories</a>
                    <a href="#products" class="text-dark hover:text-primary font-semibold">Books</a>
                    <a href="#" class="text-dark hover:text-primary font-semibold">About Us</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search for books..."
                            class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                        <button class="absolute right-3 top-2.5 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    <a href="#"
                        class="bg-primary text-white px-4 py-2 rounded-full font-bold hover:bg-opacity-90 transition">Sign
                        In</a>
                    <button id="mobile-menu-button" class="md:hidden text-primary focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="menu-overlay" class="menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="mobile-menu fixed top-0 right-0 h-full w-3/4 bg-white z-50 shadow-2xl p-6 flex flex-col">
        <div class="flex justify-between items-center mb-8">
            <div class="logo">
                <img src="images/logo.png" alt="Chain App Dev">
            </div>
            <button id="close-menu-button" class="text-gray-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="relative mb-6">
            <input type="text" placeholder="Search for books..."
                class="w-full px-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
            <button class="absolute right-3 top-3 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
        <nav class="flex flex-col space-y-4">
            <a href="#"
                class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Home</a>
            <a href="#promo"
                class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Promo</a>
            <a href="#categories"
                class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Categories</a>
            <a href="#products"
                class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Books</a>
            <a href="#" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">About
                Us</a>
            <a href="#"
                class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Contact</a>
        </nav>
        <div class="mt-auto">
            <a href="#"
                class="bg-primary text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition w-full block text-center">Sign
                In</a>
            <div class="flex justify-center space-x-6 mt-6">
                <a href="#" class="text-gray-400 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-secondary py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl text-white md:text-5xl font-extrabold mb-4">Unlock Your Potential Skills With Us
                    </h1>
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
                    <img src="images/landingpage.png " alt="Children reading books">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 md:py-24 bg-white">
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
                                <!-- <div class="mt-6">
                  <a href="#" class="bg-gradient-to-r from-primary to-blue-600 text-white px-6 py-3 rounded-full font-medium hover:opacity-90 transition-opacity">Start 14-Day Free Trial</a>
                  <span class="block mt-2 text-sm text-gray-500">*No Credit Card Required</span>
                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="flex justify-center lg:justify-end">
                            <img src="images/belajar.png" alt="Learning" class="h-90 w-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->

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
                                    <img src="images/language.png" alt="Language" class="w-8 h-8">
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
                                    <img src="images/coding.png" alt="Coding" class="w-8 h-8">
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
                                    <img src="images/iot.png" alt="IoT" class="w-8 h-8">
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
    <!-- Program Section -->

    <!-- IELTS Program Section -->
    <div id="program-ielts" class="bg-gradient-to-r from-primary_program to-secondary_program py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-7/12 flex justify-center">
                    <div class="animate-fadeInLeft">
                        <img class="w-full h-auto" src="images/ielts-program.png" alt="IELTS Program" />
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
                                        <a href="#program-ielts-sub">Get Started</a>
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
                                        <a href="https://wa.me/6281392707655">Contact Us</a>
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
                            <div class="bg-gradient-to-r from-secondary_program to-primary_program box-item">
                                <span>Silver</span>
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
                            <div class="bg-gradient-to-r from-secondary_program to-primary_program box-item">
                                <span>Gold</span>
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
                            <div class="bg-gradient-to-r from-secondary_program to-primary_program box-item">
                                <span>Platinum</span>
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
                        <div class="bg-gradient-to-r from-secondary_program to-primary_program box-item mt-4">
                            <div class="flex flex-col md:flex-row">
                                <div class="md:w-1/2">
                                    <span>Private</span>
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
                        <img class="w-full h-auto" src="images/coding-for-kids-program.png"
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
                                        <a href="#program-ielts-sub">Daftar Sekarang</a>
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
                            <img class="w-full h-auto" src="images/language-kids.png" alt="Language for Kids" />
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
                                        <a href="https://wa.me/6281392707655">Daftar Sekarang</a>
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
    <section id="promo" class="py-16 bg-white bg-section-bottom">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold">Special Promotions</h2>
                <div class="bg-red-500 text-white px-4 py-2 rounded-full font-bold animate-pulse">Limited Time Offers!
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Promo Book 1 -->
                <div
                    class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-red-500">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Math Adventures"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-red-500 text-white text-sm font-bold px-3 py-1">50% OFF
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-red-500 bg-opacity-80 text-white py-2 px-3 font-bold">
                            FLASH SALE
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                        <p class="text-gray-600 text-sm mb-3">Making math fun through stories and puzzles.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$14.99</span>
                                <span class="text-red-500 font-bold ml-1">$7.49</span>
                            </div>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Promo Book 2 -->
                <div
                    class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-red-500">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="IELTS Starter Kit"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-red-500 text-white text-sm font-bold px-3 py-1">30% OFF
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-red-500 bg-opacity-80 text-white py-2 px-3 font-bold">
                            BESTSELLER
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">IELTS Starter Kit</h3>
                        <p class="text-gray-600 text-sm mb-3">Perfect introduction to IELTS for beginners.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$19.99</span>
                                <span class="text-red-500 font-bold ml-1">$13.99</span>
                            </div>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Promo Book 3 -->
                <div
                    class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-red-500">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Science Experiments Bundle"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-red-500 text-white text-sm font-bold px-3 py-1">40% OFF
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-red-500 bg-opacity-80 text-white py-2 px-3 font-bold">
                            BUNDLE DEAL
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Science Experiments Bundle</h3>
                        <p class="text-gray-600 text-sm mb-3">3 books of amazing science experiments.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$24.99</span>
                                <span class="text-red-500 font-bold ml-1">$14.99</span>
                            </div>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Promo Book 4 -->
                <div
                    class="book-card bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 border-2 border-red-500">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="TOEFL Practice Tests"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-red-500 text-white text-sm font-bold px-3 py-1">25% OFF
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-red-500 bg-opacity-80 text-white py-2 px-3 font-bold">
                            NEW RELEASE
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">TOEFL Practice Tests</h3>
                        <p class="text-gray-600 text-sm mb-3">10 complete practice tests with answers.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$15.99</span>
                                <span class="text-red-500 font-bold ml-1">$11.99</span>
                            </div>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="#"
                    class="bg-red-500 text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">View
                    All Promotions</a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-16 bg-white bg-section-top">
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
                    <p class="text-gray-600 mb-4">Science, Technology, Engineering, Arts, and Math books for curious
                        minds.</p>
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
                    <p class="text-gray-600 mb-4">Special offers and discounted e-books for a limited time. Don't miss
                        out!</p>
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
                    <p class="text-gray-600 mb-4">Help your child excel in TOEFL with our engaging preparation
                        materials.</p>
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
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Discover our most popular educational e-books
                that children love and parents trust.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Book 1 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="IELTS Junior Prep"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                            IELTS</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">IELTS Junior Prep</h3>
                        <p class="text-gray-600 text-sm mb-3">Fun exercises to prepare children for IELTS exams.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$12.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 2 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Science Experiments at Home"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                            STEAM</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Science Experiments at Home</h3>
                        <p class="text-gray-600 text-sm mb-3">50 safe and fun experiments kids can do at home.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$9.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 3 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="TOEFL Vocabulary Builder"
                            class="w-full h-48 object-cover">
                        <div
                            class="absolute top-2 right-2 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded">
                            TOEFL</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">TOEFL Vocabulary Builder</h3>
                        <p class="text-gray-600 text-sm mb-3">Expand your child's vocabulary for TOEFL success.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$10.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 4 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Art & Craft Projects"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                            STEAM</div>
                        <div class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded">
                            NEW</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Art & Craft Projects</h3>
                        <p class="text-gray-600 text-sm mb-3">Creative projects using materials found at home.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$9.49</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 5 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Coding for Kids"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                            STEAM</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Coding for Kids</h3>
                        <p class="text-gray-600 text-sm mb-3">Introduction to programming concepts for children.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$13.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 6 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="English Grammar Fun"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                            IELTS</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">English Grammar Fun</h3>
                        <p class="text-gray-600 text-sm mb-3">Learn grammar through games and activities.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$8.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 7 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="Math Adventures"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
                            STEAM</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">Math Adventures</h3>
                        <p class="text-gray-600 text-sm mb-3">Making math fun through stories and puzzles.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$11.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Book 8 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                    <div class="relative">
                        <img src="/placeholder.svg?height=250&width=200" alt="TOEFL Junior Guide"
                            class="w-full h-48 object-cover">
                        <div
                            class="absolute top-2 right-2 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded">
                            TOEFL</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">TOEFL Junior Guide</h3>
                        <p class="text-gray-600 text-sm mb-3">Complete preparation for the TOEFL Junior test.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">$11.99</span>
                            <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-opacity-90">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="bg-secondary text-white px-6 py-3 rounded-full font-bold hover:bg-opacity-90 transition inline-block">View
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

    <!-- Footer -->
    <footer class="bg-dark text-white pt-12 pb-4">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="mb-4">
                        <img src="images/logo-white.png" alt="Achieved">
                    </div>
                    <p class="text-gray-300 mb-4">Achieved.id is an educational technology platform that uses Problem
                        base learning and Project base learning methods and implements 4C (Creativity, Communication,
                        Critical Thinking and Collaboration)</p>
                    <div class="flex space-x-4">

                        <!--- Facebook Icon -->
                        <a href="https://www.facebook.com/Achieved.id" class="text-gray-300 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>

                        <!--- Instagram Icon -->
                        <a href="https://www.instagram.com/achieved.id" class="text-gray-200 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>

                        <!-- YouTube Icon -->
                        <a href="https://www.youtube.com/@achievedid" class="text-gray-200 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg>
                        </a>

                        <!-- X (Twitter) Icon -->
                        <a href="https://x.com/Achieved_id" class="text-gray-200 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>

                        <!-- TikTok Icon -->
                        <a href="https://www.tiktok.com/@achieved.id" class="text-gray-200 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>
                    </div>
                    <div class="mb-2 mt-6">
                        <div class="logo">
                            <a href="https://blockchain.stem.org/3f718a84-dc87-4c83-8a89-3f63173df85d#acc.mQLR2TG9" class="hover:text-gray-100"><img src="images/stem-neg.png"/></a>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-200 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Categories</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Featured Books</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-200 hover:text-white">IELTS</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">STEAM Kids</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Promotions</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">TOEFL</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">All Books</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-200">
                                <p>
                                    Jl. Cikini Raya No.60, Cikini,
                                    <br>
                                    Kec. Menteng, Kota Jakarta Pusat,
                                    <br>
                                    Daerah Khusus Ibukota Jakarta 10310
                                </p>
                            </span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-200">achieved.id@gmail.com</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-200">
                                <a href="https://api.whatsapp.com/send?phone=6285287474727" class="text-gray-200 hover:text-white">+6285287474727</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-10 text-center text-gray-200">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <hr class="footer-divider">
                        <p>
                            <span> &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                            </span>
                            <span>Achieved.id | All Rights Reserved.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOverlay = document.getElementById('menu-overlay');
            const mobileMenuLinks = document.querySelectorAll('#mobile-menu nav a');

            function openMenu() {
                mobileMenu.classList.add('active');
                menuOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                mobileMenu.classList.remove('active');
                menuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            mobileMenuButton.addEventListener('click', openMenu);
            closeMenuButton.addEventListener('click', closeMenu);
            menuOverlay.addEventListener('click', closeMenu);

            // Close menu when clicking on links
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });
        });
    </script>
</body>

</html>
