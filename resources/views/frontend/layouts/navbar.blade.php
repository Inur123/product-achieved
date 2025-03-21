<header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('logo-3.png') }}" alt="KiddiBooks Logo" class="h-12 w-auto">
                </a>
            </div>
            <nav class="hidden md:flex space-x-8">
                @php $isHome = Request::is('/'); @endphp

                <a href="{{ $isHome ? '#hero' : url('/') . '#hero' }}" class="text-dark hover:text-primary font-semibold">Home</a>
                <a href="{{ $isHome ? '#about' : url('/') . '#about' }}" class="text-dark hover:text-primary font-semibold">About Us</a>
                <a href="{{ $isHome ? '#products' : url('/') . '#products' }}" class="text-dark hover:text-primary font-semibold">Books</a>
                <a href="{{ $isHome ? '#categories' : url('/') . '#categories' }}" class="text-dark hover:text-primary font-semibold">Categories</a>
                <a href="{{ $isHome ? '#promo' : url('/') . '#promo' }}" class="text-dark hover:text-primary font-semibold">Promo</a>
                <a href="{{ route('transactions.cek') }}" class="text-dark hover:text-primary font-semibold">Cek Transaksi</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="{{ route('transaction.checkout') }}" class="text-dark hover:text-primary hidden md:flex relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <!-- Indicator for the number of items in the cart -->
                    @if ($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full px-1.5 py-0.5">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
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
<div id="mobile-menu" class="mobile-menu fixed top-0 right-0 h-full w-3/4 bg-white z-50 shadow-2xl p-6 flex flex-col">
    <div class="flex justify-between items-center mb-8">
        <div class="text-2xl font-extrabold text-primary">

        </div>
        <button id="close-menu-button" class="text-gray-500 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <nav class="md:hidden flex flex-col space-y-4">
        <a href="{{ url('/') }}#hero" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Home</a>
        <a href="{{ url('/') }}#about" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">About Us</a>
        <a href="{{ url('/') }}#products" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Books</a>
        <a href="{{ url('/') }}#categories" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Categories</a>
        <a href="{{ url('/') }}#promo" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Promo</a>
        <a href="{{ route('transactions.cek') }}" class="text-dark hover:text-primary font-semibold text-xl py-2 border-b border-gray-100">Cek Transaksi</a>
    </nav>
    <div class="mt-auto">
        <a href="{{ route('transaction.checkout') }}"
        class="bg-primary text-white px-6 py-2.5 rounded-full font-bold hover:bg-opacity-90 transition flex items-center gap-2.5 relative justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
            <path d="M1 1.75A.75.75 0 0 1 1.75 1h1.628a1.75 1.75 0 0 1 1.734 1.51L5.18 3a65.25 65.25 0 0 1 13.36 1.412.75.75 0 0 1 .58.875 48.645 48.645 0 0 1-1.618 6.2.75.75 0 0 1-.712.513H6a2.503 2.503 0 0 0-2.292 1.5H17.25a.75.75 0 0 1 0 1.5H2.76a.75.75 0 0 1-.748-.807 4.002 4.002 0 0 1 2.716-3.486L3.626 2.716a.25.25 0 0 0-.248-.216H1.75A.75.75 0 0 1 1 1.75ZM6 17.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM15.5 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
          </svg>

        Checkout

        @if ($cartCount > 0)
            <span class="absolute -top-2 -right-2 bg-secondary text-white text-xs font-medium min-w-[20px] h-[20px] rounded-full flex items-center justify-center shadow-sm border border-white">
                {{ $cartCount }}
            </span>
        @endif
    </a>

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
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = document.querySelector('header')
                .offsetHeight; // Mendapatkan tinggi header
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset -
                    headerOffset - -5; // Menambahkan offset (20px)

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
