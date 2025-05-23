<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Achieved.id @if(trim($__env->yieldContent('title')) !== 'home') - @yield('title') @endif</title>
    <meta name="description" content="Achieved.id is an educational technology platform that helps individuals reach their full potential through quality STEM and language support programs.">
    <meta name="keywords" content="Achieved.id, STEM education, language learning, coding for kids, IoT, IELTS preparation">
    <meta name="author" content="Achieved.id">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Achieved.id - Unlock Your Potential Skills With Us">
    <meta property="og:description" content="Achieved.id is an educational technology platform that helps individuals reach their full potential through quality STEM and language support programs.">
    <meta property="og:image" content="{{ asset('logo-2.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Achieved.id - Unlock Your Potential Skills With Us">
    <meta property="twitter:description" content="Achieved.id is an educational technology platform that helps individuals reach their full potential through quality STEM and language support programs.">
    <meta property="twitter:image" content="{{ asset('logo-2.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" type="image/png" href="{{ asset('logo-2.png') }}" />
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="google-adsense-account" content="ca-pub-2907888650160055">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2907888650160055"
     crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Nunito", sans-serif;
        }

        .status-badge {
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }

        .transaction-card {
            transition: all 0.3s ease;
        }

        .transaction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body class="bg-light">
    <!-- Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 z-[9999] flex items-center justify-center bg-white">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-primary"></div>
    </div>

    <!-- Header -->
    @include('frontend.layouts.navbar')

    @yield('content')

    <!-- Footer -->
    @include('frontend.layouts.footer')

    <script>
        // Mobile menu functionality
        document.addEventListener("DOMContentLoaded", function() {
            const mobileMenuButton = document.getElementById("mobile-menu-button");
            const closeMenuButton = document.getElementById("close-menu-button");
            const mobileMenu = document.getElementById("mobile-menu");
            const menuOverlay = document.getElementById("menu-overlay");
            const mobileMenuLinks = document.querySelectorAll("#mobile-menu nav a");

            function openMenu() {
                mobileMenu.classList.add("active");
                menuOverlay.classList.add("active");
                document.body.style.overflow = "hidden";
            }

            function closeMenu() {
                mobileMenu.classList.remove("active");
                menuOverlay.classList.remove("active");
                document.body.style.overflow = "";
            }

            mobileMenuButton.addEventListener("click", openMenu);
            closeMenuButton.addEventListener("click", closeMenu);
            menuOverlay.addEventListener("click", closeMenu);

            // Close menu when clicking on links
            mobileMenuLinks.forEach((link) => {
                link.addEventListener("click", closeMenu);
            });
        });

        // Loading screen functionality
        document.addEventListener("DOMContentLoaded", function() {
            const loadingScreen = document.getElementById("loading-screen");

            // Tampilkan loading screen saat halaman pertama kali dimuat
            if (loadingScreen) {
                loadingScreen.classList.remove("hidden");
            }

            // Sembunyikan loading screen setelah halaman selesai dimuat
            window.addEventListener("load", function() {
                if (loadingScreen) {
                    loadingScreen.classList.add("hidden");
                }
            });
        });

        // Tampilkan loading screen saat halaman akan dimuat ulang
        window.addEventListener("beforeunload", function() {
            const loadingScreen = document.getElementById("loading-screen");
            if (loadingScreen) {
                loadingScreen.classList.remove("hidden");
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 500, // Durasi animasi (ms)
            offset: 120, // Offset trigger animasi (px)
            easing: 'ease-in-out', // Jenis easing
            once: true, // Animasi hanya sekali
        });
    </script>
</body>

</html>
