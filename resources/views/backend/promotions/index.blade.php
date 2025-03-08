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

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Promotions</h2>
            <button id="add-promo-btn"
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Promotion
            </button>
        </div>

        <!-- Active Promotions -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Discount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($promotions as $index => $promotion)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $promotion->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $promotion->discount_type == 'percentage' ? $promotion->discount_value . '% ' : 'Rp.' . $promotion->discount_value }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $promotion->start_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $promotion->end_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        {{ $promotion->status === 'active'
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800' }}">
                                        {{ $promotion->status === 'active'
                                            ? 'Active'
                                            : 'Expired' }}
                                    </span>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end space-x-2">
                                    <!-- Edit Button -->
                                    <button class="text-secondary hover:text-opacity-70 edit-promo-btn"
                                        data-id="{{ $promotion->id }}" data-promotion='{{ json_encode($promotion) }}'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <!-- Delete Button -->
                                    <button class="text-red-500 hover:text-opacity-70 delete-promotion-btn"
                                        data-id="{{ $promotion->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <p class="text-sm text-gray-600">Showing
                    {{ ($promotions->currentPage() - 1) * $promotions->perPage() + 1 }}-{{ min($promotions->currentPage() * $promotions->perPage(), $promotions->total()) }}
                    of {{ $promotions->total() }} promotions</p>
                <div class="flex space-x-2">
                    <a href="{{ $promotions->previousPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $promotions->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                    @php
                        $start = max($promotions->currentPage() - 2, 1);
                        $end = min($start + 4, $promotions->lastPage());

                        if ($end - $start < 4 && $promotions->lastPage() > 5) {
                            $start = max($promotions->lastPage() - 4, 1);
                            $end = $promotions->lastPage();
                        }
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $promotions->url(1) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                        @if ($start > 2)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $promotions->url($i) }}"
                            class="px-3 py-1 rounded {{ $promotions->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                    @endfor

                    @if ($end < $promotions->lastPage())
                        @if ($end < $promotions->lastPage() - 1)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                        <a href="{{ $promotions->url($promotions->lastPage()) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $promotions->lastPage() }}</a>
                    @endif

                    <a href="{{ $promotions->nextPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $promotions->hasMorePages() ? '' : 'disabled' }}">Next</a>
                </div>
            </div>
        </div>



        <!-- Promoted Products -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Products on Promotion</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($promotions as $promo)
                    @if (isset($promo->product))
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <div class="relative">
                                <img src="{{ $promo->product->image ? asset('storage/' . $promo->product->image) : asset('/placeholder.svg?height=150&width=250') }}"
                                    alt="{{ $promo->product->name }}" class="w-full h-40 object-cover rounded-t-lg">
                                <div class="absolute top-0 right-0 bg-red-500 text-white text-sm font-bold px-3 py-1">
                                    {{ $promo->discount_type == 'percentage' ? $promo->discount_value . '% OFF' : 'Rp ' . number_format($promo->discount_value, 0, ',', '.') . ' OFF' }}
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800">{{ $promo->product->name }}</h4>

                                <div class="flex justify-between items-center">
                                    <div>
                                        @php
                                            $originalPrice = $promo->product->harga; // Gunakan 'harga' yang sesuai dengan database
                                            $discountedPrice =
                                                $promo->discount_type === 'percentage'
                                                    ? $originalPrice - $originalPrice * ($promo->discount_value / 100)
                                                    : max($originalPrice - $promo->discount_value, 0);
                                        @endphp
                                        <span class="text-gray-400 line-through text-sm">Rp
                                            {{ number_format($originalPrice, 0, ',', '.') }}</span>
                                        <span class="text-red-500 font-bold ml-1">Rp
                                            {{ number_format($discountedPrice, 0, ',', '.') }}</span>
                                    </div>
                                    <span class="bg-primary text-white px-2 py-1 rounded-full text-xs font-medium">
                                        Promo Valid
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>



        <!-- Add Promotion Modal -->
        <div id="add-promo-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Add New Promotion</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="add-promo-form" class="space-y-4" method="POST" action="{{ route('promotions.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Select Product</label>
                            <select name="product_id" id="product_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                                <option value="">Select a category</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount Type</label>
                            <select name="discount_type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount (Rp)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount Value</label>
                            <input type="number" name="discount_value" placeholder="Enter discount value"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                <input type="date" name="start_date"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                <input type="date" name="end_date"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-add"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">
                                Create Promotion
                            </button>
                        </div>
                    </form>
                    <div id="message" class="mt-4 text-center"></div>
                </div>
            </div>
        </div>

        <!-- Edit Promotion Modal -->
      <!-- Edit Promotion Modal -->
<div id="edit-promo-modal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Edit Promotion</h3>
                <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="edit-promo-form" class="space-y-4" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product</label>
                    <input type="text" id="edit_product_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" readonly>
                    <input type="hidden" name="product_id" id="edit_product_id">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Discount Type</label>
                    <select name="discount_type" id="edit_discount_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="percentage">Percentage (%)</option>
                        <option value="fixed">Fixed Amount (Rp)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Discount Value</label>
                    <input type="number" name="discount_value" id="edit_discount_value" placeholder="Enter discount value" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" name="start_date" id="edit_start_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="date" name="end_date" id="edit_end_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                    </div>
                </div>
                <div class="flex justify-end space-x-4 pt-4">
                    <button type="button" id="cancel-edit" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">
                        Update Promotion
                    </button>
                </div>
            </form>
            <div id="edit-message" class="mt-4 text-center"></div>
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
            // Tampilkan modal saat tombol "Add New Promo" diklik
            const addPromoBtn = document.getElementById('add-promo-btn');
            const addPromoModal = document.getElementById('add-promo-modal');
            const closeModal = document.getElementById('close-modal');
            const cancelAdd = document.getElementById('cancel-add');
            const promoForm = document.getElementById('add-promo-form');

            if (addPromoBtn) {
                addPromoBtn.addEventListener('click', function() {
                    addPromoModal.classList.remove('hidden');
                });
            }

            // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    addPromoModal.classList.add('hidden');
                });
            }

            if (cancelAdd) {
                cancelAdd.addEventListener('click', function() {
                    addPromoModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal saat mengklik di luar modal
            if (addPromoModal) {
                addPromoModal.addEventListener('click', function(event) {
                    if (event.target === addPromoModal) {
                        addPromoModal.classList.add('hidden');
                    }
                });
            }

            // Tangani error validasi
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
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
    const editButtons = document.querySelectorAll('.edit-promo-btn');
    const editPromoModal = document.getElementById('edit-promo-modal');
    const closeEditModal = document.getElementById('close-edit-modal');
    const cancelEdit = document.getElementById('cancel-edit');
    const editPromoForm = document.getElementById('edit-promo-form');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const promotionId = this.getAttribute('data-id');
            const promotionData = JSON.parse(this.getAttribute('data-promotion'));

            // Isi form dengan data promotion
            document.getElementById('edit_product_name').value = promotionData.product.name;
            document.getElementById('edit_product_id').value = promotionData.product_id;
            document.getElementById('edit_discount_type').value = promotionData.discount_type;
            document.getElementById('edit_discount_value').value = promotionData.discount_value;
            document.getElementById('edit_start_date').value = promotionData.start_date;
            document.getElementById('edit_end_date').value = promotionData.end_date;

            // Set action form
            editPromoForm.action = `/promotions/${promotionId}`;

            // Tampilkan modal
            editPromoModal.classList.remove('hidden');
        });
    });

    // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
    if (closeEditModal) {
        closeEditModal.addEventListener('click', function() {
            editPromoModal.classList.add('hidden');
        });
    }

    if (cancelEdit) {
        cancelEdit.addEventListener('click', function() {
            editPromoModal.classList.add('hidden');
        });
    }

    // Sembunyikan modal saat mengklik di luar modal
    if (editPromoModal) {
        editPromoModal.addEventListener('click', function(event) {
            if (event.target === editPromoModal) {
                editPromoModal.classList.add('hidden');
            }
        });
    }
});
    </script>

    {{-- Destror --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani tombol delete
            const deleteButtons = document.querySelectorAll('.delete-promotion-btn');

            if (deleteButtons) {
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const promotionId = this.getAttribute('data-id');

                        // Tampilkan konfirmasi SweetAlert2
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#2A6B96',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Kirim request delete ke server
                                fetch(`/promotions/${promotionId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Tampilkan notifikasi sukses
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Deleted!',
                                                text: data.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then(() => {
                                                // Reload halaman setelah penghapusan
                                                window.location.reload();
                                            });
                                        } else {
                                            // Tampilkan notifikasi error
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Failed!',
                                                text: data.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        });
                    });
                });
            }
        });
    </script>

@endsection
