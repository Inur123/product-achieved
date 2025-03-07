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
            <h2 class="text-xl font-bold text-gray-800">Products</h2>
            <button id="add-product-btn"
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Product
            </button>
        </div>
        <!-- Products Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Code Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Terjual</th> <!-- New column for total sold -->
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($products as $index => $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $product->code_product }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="h-10 w-10 rounded-lg object-cover">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                        {{ $product->category->name ?? 'No Category' }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    Rp. {{ number_format($product->harga, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $product->transactions_count ?? 0 }}
                                    <!-- Display total sold or 0 if not available -->
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->status }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-opacity-70 mr-3 view-product-btn"
                                        data-id="{{ $product->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                        </svg>
                                    </button>
                                    <button class="text-secondary hover:text-opacity-70 mr-3 edit-product-btn"
                                        data-id="{{ $product->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-500 hover:text-opacity-70 delete-product-btn"
                                        data-id="{{ $product->id }}">
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
                    {{ ($products->currentPage() - 1) * $products->perPage() + 1 }}-{{ min($products->currentPage() * $products->perPage(), $products->total()) }}
                    of {{ $products->total() }} products</p>
                <div class="flex space-x-2">
                    <a href="{{ $products->previousPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $products->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                    @php
                        $start = max($products->currentPage() - 2, 1);
                        $end = min($start + 4, $products->lastPage());

                        if ($end - $start < 4 && $products->lastPage() > 5) {
                            $start = max($products->lastPage() - 4, 1);
                            $end = $products->lastPage();
                        }
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $products->url(1) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                        @if ($start > 2)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $products->url($i) }}"
                            class="px-3 py-1 rounded {{ $products->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                    @endfor

                    @if ($end < $products->lastPage())
                        @if ($end < $products->lastPage() - 1)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                        <a href="{{ $products->url($products->lastPage()) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $products->lastPage() }}</a>
                    @endif

                    <a href="{{ $products->nextPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $products->hasMorePages() ? '' : 'disabled' }}">Next</a>
                </div>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div id="add-product-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Add New Product</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="product-form" action="{{ route('products.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Code</label>
                                <input type="text" name="code_product" id="code_product"
                                    value="{{ $code_product ?? old('code_product') }}" placeholder="Enter product code"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Enter product name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="3" placeholder="Enter product description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>{{ old('description') }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price (Rp)</label>
                                <input type="number" step="0.01" name="harga" id="harga"
                                    value="{{ old('harga') }}" placeholder="Enter price"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select name="category_id" id="category_id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="active">Active</option>
                                <option value="nonactive">Nonactive</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                    <img id="image-preview" class="hidden w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="image" id="product-image" class="hidden"
                                        accept="image/*">
                                    <label for="product-image"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg cursor-pointer inline-block">
                                        Choose File
                                    </label>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, or GIF (Max. 2MB)</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-add"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Save
                                Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Product Modal -->
        <div id="edit-product-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Edit Product</h3>
                        <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="edit-product-form" action="" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Code</label>
                                <input type="text" name="code_product" id="edit-code_product"
                                    value="{{ $product->code_product ?? '' }}" placeholder="Enter product code"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    readonly>

                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <input type="text" name="name" id="edit-name" placeholder="Enter product name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="edit-description" rows="3" placeholder="Enter product description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price (Rp)</label>
                                <input type="number" step="0.01" name="harga" id="edit-harga"
                                    placeholder="Enter price"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select name="category" id="edit-category"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                                    <!-- Opsi kategori akan diisi oleh JavaScript -->
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="edit-status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="active">Active</option>
                                <option value="nonactive">Nonactive</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                    <img id="edit-image-preview" class="hidden w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="image" id="edit-product-image" class="hidden"
                                        accept="image/*">
                                    <label for="edit-product-image"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg cursor-pointer inline-block">
                                        Choose File
                                    </label>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, or GIF (Max. 2MB)</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-edit"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Update
                                Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Detail Product Modal -->
        <div id="detail-product-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Product Details</h3>
                        <button id="close-detail-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Code</label>
                                <p id="detail-code_product" class="text-sm text-gray-600"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <p id="detail-name" class="text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <p id="detail-description" class="text-sm text-gray-600"></p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price (Rp)</label>
                                <p id="detail-harga" class="text-sm text-gray-600"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <p id="detail-category" class="text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <p id="detail-status" class="text-sm text-gray-600"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                            <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                <img id="detail-image-preview" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" id="cancel-detail"
                            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Close</button>
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

            // Tampilkan modal saat tombol "Add New Product" diklik
            const addProductBtn = document.getElementById('add-product-btn');
            const addProductModal = document.getElementById('add-product-modal');
            const closeModal = document.getElementById('close-modal');
            const cancelAdd = document.getElementById('cancel-add');

            const codeProductInput = document.getElementById('code_product');

            // Set the code_product value dynamically if it's passed
            if (codeProductInput) {
                codeProductInput.value = '{{ $code_product ?? '' }}';
            }

            if (addProductBtn) {
                addProductBtn.addEventListener('click', function() {
                    addProductModal.classList.remove('hidden');
                });
            }

            // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    addProductModal.classList.add('hidden');
                });
            }

            if (cancelAdd) {
                cancelAdd.addEventListener('click', function() {
                    addProductModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal saat mengklik di luar modal
            if (addProductModal) {
                addProductModal.addEventListener('click', function(event) {
                    if (event.target === addProductModal) {
                        addProductModal.classList.add('hidden');
                    }
                });
            }

            // Preview gambar
            document.getElementById("product-image").addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById("image-preview");
                        preview.src = e.target.result;
                        preview.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            });

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
            // Tampilkan modal edit saat tombol edit diklik
            const editButtons = document.querySelectorAll('.edit-product-btn');
            const editProductModal = document.getElementById('edit-product-modal');
            const closeEditModal = document.getElementById('close-edit-modal');
            const cancelEdit = document.getElementById('cancel-edit');

            if (editButtons) {
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');
                        fetch(`/products/${productId}/edit`)
                            .then(response => response.json())
                            .then(data => {
                                const product = data.product;
                                const categories = data.categories;

                                // Isi form dengan data produk
                                document.getElementById('edit-code_product').value = product
                                    .code_product;
                                document.getElementById('edit-name').value = product.name;
                                document.getElementById('edit-description').value = product
                                    .description;
                                document.getElementById('edit-harga').value = product.harga;
                                document.getElementById('edit-status').value = product.status;
                                document.getElementById('edit-image-preview').src =
                                    `{{ asset('storage/') }}/${product.image}`;
                                document.getElementById('edit-image-preview').classList.remove(
                                    'hidden');

                                // Isi dropdown category
                                const categorySelect = document.getElementById('edit-category');
                                categorySelect.innerHTML =
                                    ''; // Kosongkan dropdown terlebih dahulu

                                // Tambahkan opsi default
                                const defaultOption = document.createElement('option');
                                defaultOption.value = '';
                                defaultOption.textContent = 'Select a category';
                                categorySelect.appendChild(defaultOption);

                                // Tambahkan opsi kategori
                                categories.forEach(category => {
                                    const option = document.createElement('option');
                                    option.value = category.id;
                                    option.textContent = category.name;

                                    // Tandai kategori yang dipilih
                                    if (category.id == product.category_id) {
                                        option.selected = true;
                                    }

                                    categorySelect.appendChild(option);
                                });

                                // Set action form
                                document.getElementById('edit-product-form').action =
                                    `/products/${productId}`;

                                // Tampilkan modal
                                editProductModal.classList.remove('hidden');
                            });
                    });
                });
            }

            // Sembunyikan modal edit saat tombol close atau cancel diklik
            if (closeEditModal) {
                closeEditModal.addEventListener('click', function() {
                    editProductModal.classList.add('hidden');
                });
            }

            if (cancelEdit) {
                cancelEdit.addEventListener('click', function() {
                    editProductModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal edit saat mengklik di luar modal
            if (editProductModal) {
                editProductModal.addEventListener('click', function(event) {
                    if (event.target === editProductModal) {
                        editProductModal.classList.add('hidden');
                    }
                });
            }

            // Preview gambar pada modal edit
            document.getElementById("edit-product-image").addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById("edit-image-preview");
                        preview.src = e.target.result;
                        preview.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan modal detail saat tombol detail diklik
            const viewButtons = document.querySelectorAll('.view-product-btn');
            const detailProductModal = document.getElementById('detail-product-modal');
            const closeDetailModal = document.getElementById('close-detail-modal');
            const cancelDetail = document.getElementById('cancel-detail');

            if (viewButtons) {
                viewButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');
                        fetch(`/products/${productId}`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('detail-code_product').textContent =
                                    data.code_product;
                                document.getElementById('detail-name').textContent = data.name;
                                document.getElementById('detail-description').textContent = data
                                    .description;
                                document.getElementById('detail-harga').textContent =
                                    `Rp ${data.harga.toLocaleString()}`;
                                    document.getElementById('detail-category').textContent = data.category || 'No category available';
                                document.getElementById('detail-status').textContent = data
                                    .status;
                                document.getElementById('detail-image-preview').src =
                                    `{{ asset('storage/') }}/${data.image}`;
                                detailProductModal.classList.remove('hidden');
                            });
                    });
                });
            }

            if (cancelDetail) {
                cancelDetail.addEventListener('click', function() {
                    detailProductModal.classList.add('hidden');
                });
            }


            // Sembunyikan modal detail saat tombol close diklik
            if (closeDetailModal) {
                closeDetailModal.addEventListener('click', function() {
                    detailProductModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal detail saat mengklik di luar modal
            if (detailProductModal) {
                detailProductModal.addEventListener('click', function(event) {
                    if (event.target === detailProductModal) {
                        detailProductModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    {{-- destroy --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani tombol delete
            const deleteButtons = document.querySelectorAll('.delete-product-btn');

            if (deleteButtons) {
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');

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
                                fetch(`/products/${productId}`, {
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
