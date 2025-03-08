@extends('backend.layouts.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4 bg-gray-50">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <!-- Active Coupons -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Coupons</p>
                    <p class="text-3xl font-bold text-gray-800">12</p>
                </div>
                <div class="p-3 rounded-full bg-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Expired Coupons -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Expired Coupons</p>
                    <p class="text-3xl font-bold text-gray-800">8</p>
                </div>
                <div class="p-3 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Redemptions -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Redemptions</p>
                    <p class="text-3xl font-bold text-gray-800">1,245</p>
                </div>
                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Coupon Button -->
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-bold text-gray-800">All Coupons</h2>
        <button id="add-coupon-btn" class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add New Coupon
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="relative w-full md:w-64">
                <input type="text" placeholder="Search coupons..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <button class="absolute right-3 top-2.5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="expired">Expired</option>
                    <option value="scheduled">Scheduled</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">All Types</option>
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed Amount</option>
                    <option value="free-shipping">Free Shipping</option>
                </select>
                <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Coupons Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valid From</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valid Until</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usage</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">SUMMER10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Summer Sale Discount</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">10% off</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 1, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jun 30, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">245 / 500</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-secondary hover:text-opacity-70 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">WELCOME20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">New Customer Discount</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">20% off</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jan 1, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 31, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">378 / 1000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-secondary hover:text-opacity-70 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">FREESHIP</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Free Shipping on Orders</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Free Shipping</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Feb 15, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Apr 15, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">156 / 300</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-secondary hover:text-opacity-70 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">FLASH25</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Flash Sale Discount</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">25% off</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 10, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mar 12, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">89 / 200</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-secondary hover:text-opacity-70 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">HOLIDAY15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Holiday Season Discount</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">15% off</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 1, 2024</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jan 15, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Expired</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">377 / 500</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-secondary hover:text-opacity-70 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="coupon-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl mx-4">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-800">Add New Coupon</h3>
                            <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="coupon-code" class="block text-sm font-medium text-gray-700 mb-2">Coupon Code*</label>
                                    <input type="text" id="coupon-code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="e.g. SUMMER10">
                                </div>
                                <div>
                                    <label for="coupon-type" class="block text-sm font-medium text-gray-700 mb-2">Discount Type*</label>
                                    <select id="coupon-type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option value="percentage">Percentage Discount</option>
                                        <option value="fixed">Fixed Amount Discount</option>
                                        <option value="free-shipping">Free Shipping</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="discount-value" class="block text-sm font-medium text-gray-700 mb-2">Discount Value*</label>
                                    <input type="number" id="discount-value" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="e.g. 10">
                                </div>
                                <div>
                                    <label for="min-purchase" class="block text-sm font-medium text-gray-700 mb-2">Minimum Purchase</label>
                                    <input type="number" id="min-purchase" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="e.g. 50">
                                </div>
                                <div>
                                    <label for="valid-from" class="block text-sm font-medium text-gray-700 mb-2">Valid From*</label>
                                    <input type="date" id="valid-from" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                <div>
                                    <label for="valid-until" class="block text-sm font-medium text-gray-700 mb-2">Valid Until*</label>
                                    <input type="date" id="valid-until" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                <div>
                                    <label for="usage-limit" class="block text-sm font-medium text-gray-700 mb-2">Usage Limit</label>
                                    <input type="number" id="usage-limit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="e.g. 500">
                                </div>
                                <div>
                                    <label for="coupon-status" class="block text-sm font-medium text-gray-700 mb-2">Status*</label>
                                    <select id="coupon-status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="scheduled">Scheduled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="coupon-description" class="block text-sm font-medium text-gray-700 mb-2">Description*</label>
                                <textarea id="coupon-description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Describe the coupon..."></textarea>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" id="cancel-coupon" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">Cancel</button>
                                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition">Save Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-sm text-gray-600">Showing 1-5 of 20 coupons</p>
            <div class="flex space-x-2">
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">Previous</button>
                <button class="px-3 py-1 rounded bg-primary text-white">1</button>
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">Next</button>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const addCouponBtn = document.getElementById('add-coupon-btn');
        const couponModal = document.getElementById('coupon-modal');
        const closeModal = document.getElementById('close-modal');
        const cancelCoupon = document.getElementById('cancel-coupon');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = sidebarToggle.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Modal functionality
        addCouponBtn.addEventListener('click', function() {
            couponModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', function() {
            couponModal.classList.add('hidden');
        });

        cancelCoupon.addEventListener('click', function() {
            couponModal.classList.add('hidden');
        });

        // Close modal when clicking outside
        couponModal.addEventListener('click', function(event) {
            if (event.target === couponModal) {
                couponModal.classList.add('hidden');
            }
        });
    });
</script>
@endsection
