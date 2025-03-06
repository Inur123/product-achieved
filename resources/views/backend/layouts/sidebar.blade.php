<aside id="sidebar" class="sidebar bg-dark text-white w-64 min-h-screen flex flex-col fixed md:relative z-50">
    <div class="p-4 border-b border-gray-700">
        <div class="text-2xl font-extrabold">
            <img src="{{ asset('logo-3.png') }}" alt="KiddiBooks Logo" class="h-12 w-auto">
        </div>
    </div>

    <nav class="flex-1 p-4">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg
                          {{ request()->routeIs('dashboard') ? 'bg-primary bg-opacity-20 text-primary' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('products.index') }}"
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg
                          {{ request()->routeIs('products.*') ? 'bg-primary bg-opacity-20 text-primary' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}"
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg
                          {{ request()->routeIs('categories.*') ? 'bg-primary bg-opacity-20 text-primary' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg
                          {{ request()->routeIs('transaksi.*') ? 'bg-primary bg-opacity-20 text-primary' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M2.5 4A1.5 1.5 0 0 0 1 5.5V6h18v-.5A1.5 1.5 0 0 0 17.5 4h-15ZM19 8.5H1v6A1.5 1.5 0 0 0 2.5 16h15a1.5 1.5 0 0 0 1.5-1.5v-6ZM3 13.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75Zm4.75-.75a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z" clip-rule="evenodd" />
                          </svg>

                    <span>Transaksi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('promotions.index') }}"
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg
                          {{ request()->routeIs('promotions.*') ? 'bg-primary bg-opacity-20 text-primary' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    <span>Promotions</span>
                </a>
            </li>
            <li>
                <a href="coupons.html" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-700 text-gray-300 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <span>Coupons</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-700 text-gray-300 hover:text-white w-full text-left">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
