@extends('backend.layouts.app')
@section('content')
    <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
        <!-- Notifikasi Sukses -->
        @if (session('success') || session('error') || session('warning') || session('info'))
            <div id="alert" class="fixed top-4 right-4 md:right-10 z-50">
                <div class="bg-{{ session('success') ? 'green' : (session('error') ? 'red' : (session('warning') ? 'yellow' : 'blue')) }}-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between w-full md:w-auto"
                    role="alert">
                    <span
                        class="mr-2">{{ session('success') ?? (session('error') ?? (session('warning') ?? session('info'))) }}</span>
                    <button type="button" class="close-alert text-white hover:text-gray-300 focus:outline-none">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

            <!-- Active Coupons -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Coupons</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $activeCouponsCount }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-green-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Expired Coupons -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Expired Coupons</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $inactiveCouponsCount }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Redemptions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Redemptions</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalUsedCoupons }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-primary bg-opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Coupon Button -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-800">All Coupons</h2>
            <button id="add-coupon-btn"
                class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Coupon
            </button>
        </div>
        <!-- Coupons Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diskon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kuota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terpakai</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($coupons as $index => $coupon)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $coupon->code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $coupon->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $coupon->discount_type == 'percentage' ? $coupon->discount_value . '%' : 'Rp ' . number_format($coupon->discount_value, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $coupon->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($coupon->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $coupon->limit ?? 'Unlimited' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $coupon->used }} <!-- Tampilkan jumlah kupon yang sudah digunakan -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-secondary hover:text-opacity-70 edit-coupon-btn" data-id="{{ $coupon->id }}" data-coupon='{{ json_encode($coupon) }}'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 0L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Add Coupon Modal -->
                <div id="coupon-modal"
                    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div
                        class="bg-white rounded-lg shadow-lg w-full max-w-lg md:max-w-2xl mx-4 transition-transform transform scale-95">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-900">Add New Coupon</h3>
                            <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <form id="coupon-form" action="{{ route('coupons.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="code" class="block text-sm font-medium text-gray-700">Coupon
                                            Code*</label>
                                        <input type="text" id="code" name="code"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. SUMMER10" required>
                                    </div>
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Coupon
                                            Name*</label>
                                        <input type="text" id="name" name="name"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. Summer Sale" required>
                                    </div>
                                    <div>
                                        <label for="discount_type"
                                            class="block text-sm font-medium text-gray-700">Discount Type*</label>
                                        <select id="discount_type" name="discount_type"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            required>
                                            <option value="percentage">Percentage Discount</option>
                                            <option value="fixed">Fixed Amount Discount</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="discount_value"
                                            class="block text-sm font-medium text-gray-700">Discount Value*</label>
                                        <input type="number" id="discount_value" name="discount_value"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. 10" required>
                                    </div>
                                    <div>
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">Status*</label>
                                        <select id="status" name="status"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            required>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="limit" class="block text-sm font-medium text-gray-700">Usage
                                            Limit</label>
                                        <input type="number" id="limit" name="limit"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. 500">
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700">Applicable Products</label>
                                    <div class="border border-gray-300 rounded-lg p-4 max-h-60 overflow-y-auto mt-2">
                                        <div class="gap-4">
                                            @foreach ($products as $product)
                                                <div class="flex items-center">
                                                    <input type="checkbox" id="product-{{ $product->id }}"
                                                        name="products[]" value="{{ $product->id }}"
                                                        class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                                                    <label for="product-{{ $product->id }}"
                                                        class="ml-2 text-sm text-gray-700">{{ $product->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end space-x-3">
                                    <button type="button" id="cancel-coupon"
                                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">Cancel</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition">Save
                                        Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal for Coupons -->
                <div id="edit-coupon-modal"
                    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div
                        class="bg-white rounded-lg shadow-lg w-full max-w-lg md:max-w-2xl mx-4 transition-transform transform scale-95">
                        <!-- Header Modal -->
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-900">Edit Coupon</h3>
                            <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Form Edit Coupon -->
                        <div class="p-6">
                            <form id="edit-coupon-form" action="{{ route('coupons.update', ['coupon' => ':id']) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Coupon Code -->
                                    <div>
                                        <label for="edit-code" class="block text-sm font-medium text-gray-700">Coupon
                                            Code*</label>
                                        <input type="text" id="edit-code" name="code"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. SUMMER10" required>
                                    </div>

                                    <!-- Coupon Name -->
                                    <div>
                                        <label for="edit-name" class="block text-sm font-medium text-gray-700">Coupon
                                            Name*</label>
                                        <input type="text" id="edit-name" name="name"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. Summer Sale" required>
                                    </div>

                                    <!-- Discount Type -->
                                    <div>
                                        <label for="edit-discount_type"
                                            class="block text-sm font-medium text-gray-700">Discount Type*</label>
                                        <select id="edit-discount_type" name="discount_type"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            required>
                                            <option value="percentage">Percentage Discount</option>
                                            <option value="fixed">Fixed Amount Discount</option>
                                        </select>
                                    </div>

                                    <!-- Discount Value -->
                                    <div>
                                        <label for="edit-discount_value"
                                            class="block text-sm font-medium text-gray-700">Discount Value*</label>
                                        <input type="number" id="edit-discount_value" name="discount_value"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. 10" required>
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="edit-status"
                                            class="block text-sm font-medium text-gray-700">Status*</label>
                                        <select id="edit-status" name="status"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            required>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Usage Limit -->
                                    <div>
                                        <label for="edit-limit" class="block text-sm font-medium text-gray-700">Usage
                                            Limit</label>
                                        <input type="number" id="edit-limit" name="limit"
                                            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                            placeholder="e.g. 500">
                                    </div>
                                </div>


                                <!-- Applicable Products -->
                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700">Applicable Products</label>
                                    <div class="border border-gray-300 rounded-lg p-4 max-h-60 overflow-y-auto mt-2">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach ($products as $product)
                                                <div class="flex items-center">
                                                    <input type="checkbox" id="edit-product-{{ $product->id }}"
                                                        name="products[]" value="{{ $product->id }}"
                                                        class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                                                    <label for="edit-product-{{ $product->id }}"
                                                        class="ml-2 text-sm text-gray-700">{{ $product->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Footer Modal (Cancel & Update Buttons) -->
                                <div class="mt-6 flex justify-end space-x-3">
                                    <button type="button" id="cancel-edit"
                                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">Cancel</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition">Update
                                        Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-600">Showing
                        {{ ($coupons->currentPage() - 1) * $coupons->perPage() + 1 }}-{{ min($coupons->currentPage() * $coupons->perPage(), $coupons->total()) }}
                        of {{ $coupons->total() }} coupons</p>
                    <div class="flex space-x-2">
                        <a href="{{ $coupons->previousPageUrl() }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $coupons->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                        @php
                            $start = max($coupons->currentPage() - 2, 1);
                            $end = min($start + 4, $coupons->lastPage());

                            if ($end - $start < 4 && $coupons->lastPage() > 5) {
                                $start = max($coupons->lastPage() - 4, 1);
                                $end = $coupons->lastPage();
                            }
                        @endphp

                        @if ($start > 1)
                            <a href="{{ $coupons->url(1) }}"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                            @if ($start > 2)
                                <span class="px-3 py-1 text-gray-600">...</span>
                            @endif
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            <a href="{{ $coupons->url($i) }}"
                                class="px-3 py-1 rounded {{ $coupons->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                        @endfor

                        @if ($end < $coupons->lastPage())
                            @if ($end < $coupons->lastPage() - 1)
                                <span class="px-3 py-1 text-gray-600">...</span>
                            @endif
                            <a href="{{ $coupons->url($coupons->lastPage()) }}"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $coupons->lastPage() }}</a>
                        @endif

                        <a href="{{ $coupons->nextPageUrl() }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $coupons->hasMorePages() ? '' : 'disabled' }}">Next</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen notifikasi
            const alertElement = document.getElementById('alert');
            const closeAlertButton = document.querySelector('.close-alert');

            // Jika notifikasi ada
            if (alertElement) {
                // Tutup notifikasi setelah 5 detik
                setTimeout(() => {
                    alertElement.remove();
                }, 5000); // 5000 milidetik = 5 detik

                // Tutup notifikasi saat tombol close diklik
                if (closeAlertButton) {
                    closeAlertButton.addEventListener('click', () => {
                        alertElement.remove();
                    });
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addCouponBtn = document.getElementById('add-coupon-btn');
            const addCouponModal = document.getElementById('coupon-modal');
            const closeModal = document.getElementById('close-modal');
            const cancelCoupon = document.getElementById('cancel-coupon');

            if (addCouponBtn) {
                addCouponBtn.addEventListener('click', function() {
                    addCouponModal.classList.remove('hidden');
                });
            }

            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    addCouponModal.classList.add('hidden');
                });
            }

            if (cancelCoupon) {
                cancelCoupon.addEventListener('click', function() {
                    addCouponModal.classList.add('hidden');
                });
            }

            if (addCouponModal) {
                addCouponModal.addEventListener('click', function(event) {
                    if (event.target === addCouponModal) {
                        addCouponModal.classList.add('hidden');
                    }
                });
            }

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            @endif
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan modal edit saat tombol "Edit" diklik
            const editButtons = document.querySelectorAll('.edit-coupon-btn');
            const editCouponModal = document.getElementById('edit-coupon-modal');
            const closeEditModal = document.getElementById('close-edit-modal');
            const cancelEdit = document.getElementById('cancel-edit');
            const editCouponForm = document.getElementById('edit-coupon-form');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const couponId = this.getAttribute('data-id');
                    const couponData = JSON.parse(this.getAttribute('data-coupon'));

                    // Isi form dengan data coupon
                    document.getElementById('edit-code').value = couponData.code;
                    document.getElementById('edit-name').value = couponData.name;
                    document.getElementById('edit-discount_type').value = couponData.discount_type;
                    document.getElementById('edit-discount_value').value = couponData
                        .discount_value;
                    document.getElementById('edit-status').value = couponData.status;
                    document.getElementById('edit-limit').value = couponData.limit || '';

                    // Reset semua checkbox terlebih dahulu
                    const productCheckboxes = document.querySelectorAll(
                        '#edit-coupon-form input[name="products[]"]');
                    productCheckboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });

                    // Centang produk yang sesuai
                    if (couponData.products && couponData.products.length > 0) {
                        // Jika products adalah array of objects dengan properti id
                        if (typeof couponData.products[0] === 'object') {
                            const productIds = couponData.products.map(product => product.id);
                            productCheckboxes.forEach(checkbox => {
                                if (productIds.includes(parseInt(checkbox.value))) {
                                    checkbox.checked = true;
                                }
                            });
                        }
                        // Jika products adalah array of integers
                        else {
                            productCheckboxes.forEach(checkbox => {
                                if (couponData.products.includes(parseInt(checkbox
                                        .value))) {
                                    checkbox.checked = true;
                                }
                            });
                        }
                    }

                    // Update form action URL dengan ID coupon
                    editCouponForm.action = editCouponForm.action.replace(':id', couponId);

                    // Tampilkan modal
                    editCouponModal.classList.remove('hidden');
                });
            });

            // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
            if (closeEditModal) {
                closeEditModal.addEventListener('click', function() {
                    editCouponModal.classList.add('hidden');
                });
            }

            if (cancelEdit) {
                cancelEdit.addEventListener('click', function() {
                    editCouponModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal saat mengklik di luar modal
            if (editCouponModal) {
                editCouponModal.addEventListener('click', function(event) {
                    if (event.target === editCouponModal) {
                        editCouponModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>


@endsection
