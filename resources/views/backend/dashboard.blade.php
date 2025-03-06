@extends('backend.layouts.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4 bg-gray-50">
    @if(session('success') || session('error') || session('warning') || session('info'))
    <div id="alert" class="fixed top-4 right-4 md:right-10 z-50">
        <div class="bg-{{ session('success') ? 'green' : (session('error') ? 'red' : (session('warning') ? 'yellow' : 'blue')) }}-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between w-full md:w-auto" role="alert">
            <span class="mr-2">{{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}</span>
            <button type="button" class="close-alert text-white hover:text-gray-300 focus:outline-none">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Total Products -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Products</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalProducts }}</p>
                </div>
                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    12% increase
                </span>
                <p class="text-xs text-gray-500 mt-1">Compared to last month</p>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Category</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalCategories }}</p>
                </div>
                <div class="p-3 rounded-full bg-secondary bg-opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    8% increase
                </span>
                <p class="text-xs text-gray-500 mt-1">Compared to last month</p>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Orders</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalTransactions }}</p>
                </div>
                <div class="p-3 rounded-full bg-accent bg-opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    15% increase
                </span>
                <p class="text-xs text-gray-500 mt-1">Compared to last month</p>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-800">
                        Rp. {{ number_format($totalRevenue, 0, ',', '.') }}
                    </p>
                </div>
                <div class="p-3 rounded-full bg-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    23% increase
                </span>
                <p class="text-xs text-gray-500 mt-1">Compared to last month</p>
            </div>
        </div>
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-800">Recent Orders</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">#ORD-7842</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Sarah Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 5, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">$29.97</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">#ORD-7841</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Michael Chen</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 4, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">$42.50</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">#ORD-7840</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Amanda Rodriguez</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 3, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">$18.99</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">#ORD-7839</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 2, 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">$35.45</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-100 text-center">
                <a href="#" class="text-primary hover:underline text-sm font-medium">View All Orders</a>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-800">Top Selling Products</h2>
            </div>
            <div class="p-6">
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg">
                            <img src="/placeholder.svg?height=48&width=48" alt="IELTS Junior Prep" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-800">IELTS Junior Prep</h3>
                            <p class="text-xs text-gray-500">IELTS Category</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">$12.99</p>
                            <p class="text-xs text-gray-500">342 sold</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg">
                            <img src="/placeholder.svg?height=48&width=48" alt="Science Experiments at Home" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-800">Science Experiments at Home</h3>
                            <p class="text-xs text-gray-500">STEAM Category</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">$9.99</p>
                            <p class="text-xs text-gray-500">287 sold</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg">
                            <img src="/placeholder.svg?height=48&width=48" alt="Math Adventures" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-800">Math Adventures</h3>
                            <p class="text-xs text-gray-500">STEAM Category</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">$11.99</p>
                            <p class="text-xs text-gray-500">245 sold</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg">
                            <img src="/placeholder.svg?height=48&width=48" alt="TOEFL Vocabulary Builder" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-800">TOEFL Vocabulary Builder</h3>
                            <p class="text-xs text-gray-500">TOEFL Category</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800">$10.99</p>
                            <p class="text-xs text-gray-500">198 sold</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="p-4 border-t border-gray-100 text-center">
                <a href="#" class="text-primary hover:underline text-sm font-medium">View All Products</a>
            </div>
        </div>
    </div>
</main>
@endsection
