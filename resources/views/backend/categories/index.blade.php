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
            <h2 class="text-xl font-bold text-gray-800">Category</h2>
            <button id="add-category-btn"
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Category
            </button>
        </div>
        <!-- Category Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($categories as $index => $category)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $category->description }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-opacity-70 mr-3 view-category-btn"
                                        data-id="{{ $category->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                        </svg>
                                    </button>
                                    <button class="text-secondary hover:text-opacity-70 mr-3 edit-category-btn"
                                        data-id="{{ $category->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-500 hover:text-opacity-70">
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
                    {{ ($categories->currentPage() - 1) * $categories->perPage() + 1 }}-{{ min($categories->currentPage() * $categories->perPage(), $categories->total()) }}
                    of {{ $categories->total() }} Categories</p>
                <div class="flex space-x-2">
                    <a href="{{ $categories->previousPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $categories->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                    @php
                        $start = max($categories->currentPage() - 2, 1);
                        $end = min($start + 4, $categories->lastPage());

                        if ($end - $start < 4 && $categories->lastPage() > 5) {
                            $start = max($categories->lastPage() - 4, 1);
                            $end = $categories->lastPage();
                        }
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $categories->url(1) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                        @if ($start > 2)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $categories->url($i) }}"
                            class="px-3 py-1 rounded {{ $categories->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                    @endfor

                    @if ($end < $categories->lastPage())
                        @if ($end < $categories->lastPage() - 1)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                        <a href="{{ $categories->url($categories->lastPage()) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $categories->lastPage() }}</a>
                    @endif

                    <a href="{{ $categories->nextPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $categories->hasMorePages() ? '' : 'disabled' }}">Next</a>
                </div>
            </div>
        </div>

        <!-- Add Category Modal -->
        <div id="add-category-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Add New Category</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="category-form" action="{{ route('categories.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg">
                        @csrf
                        <!-- Input untuk Nama Kategori -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name Category
                                </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                placeholder="Enter category name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>

                        <!-- Input untuk Deskripsi -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="3" placeholder="Enter category description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                >{{ old('description') }}</textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" id="cancel-add"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Save
                                Category</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Edit Category Modal -->
        <div id="edit-category-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Edit Category</h3>
                        <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="edit-category-form" action="" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <input type="text" name="name" id="edit-name" placeholder="Enter category name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="edit-description" rows="3" placeholder="Enter category description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                ></textarea>
                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-edit"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Update
                                Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Detail category Modal -->
        <div id="detail-category-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Category Details</h3>
                        <button id="close-detail-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <p id="detail-name" class="text-sm text-gray-600"></p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <p id="detail-description" class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" id="cancel-detail" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            // Tampilkan modal saat tombol "Add New category" diklik
            const addCategoryBtn = document.getElementById('add-category-btn');
            const addCategoryModal = document.getElementById('add-category-modal');
            const closeModal = document.getElementById('close-modal');
            const cancelAdd = document.getElementById('cancel-add');

            if (addCategoryBtn) {
                addCategoryBtn.addEventListener('click', function() {
                    addCategoryModal.classList.remove('hidden');
                });
            }

            // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    addCategoryModal.classList.add('hidden');
                });
            }

            if (cancelAdd) {
                cancelAdd.addEventListener('click', function() {
                    addCategoryModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal saat mengklik di luar modal
            if (addCategoryModal) {
                addCategoryModal.addEventListener('click', function(event) {
                    if (event.target === addCategoryModal) {
                        addCategoryModal.classList.add('hidden');
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
            // Tampilkan modal edit saat tombol edit diklik
            const editButtons = document.querySelectorAll('.edit-category-btn');
            const editCategoryModal = document.getElementById('edit-category-modal');
            const closeEditModal = document.getElementById('close-edit-modal');
            const cancelEdit = document.getElementById('cancel-edit');

            if (editButtons) {
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const categoryId = this.getAttribute('data-id');
                        fetch(`/categories/${categoryId}/edit`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('edit-name').value = data.name;
                                document.getElementById('edit-description').value = data
                                    .description;
                                document.getElementById('edit-category-form').action =
                                    `/categories/${categoryId}`;
                                editCategoryModal.classList.remove('hidden');
                            });
                    });
                });
            }

            // Sembunyikan modal edit saat tombol close atau cancel diklik
            if (closeEditModal) {
                closeEditModal.addEventListener('click', function() {
                    editCategoryModal.classList.add('hidden');
                });
            }

            if (cancelEdit) {
                cancelEdit.addEventListener('click', function() {
                    editCategoryModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal edit saat mengklik di luar modal
            if (editCategoryModal) {
                editCategoryModal.addEventListener('click', function(event) {
                    if (event.target === editCategoryModal) {
                        editCategoryModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
   <script>
   document.addEventListener('DOMContentLoaded', function() {
    // Tampilkan modal detail saat tombol detail diklik
    const viewButtons = document.querySelectorAll('.view-category-btn');
    const detailCategoryModal = document.getElementById('detail-category-modal');
    const closeDetailModal = document.getElementById('close-detail-modal');
    const cancelDetail = document.getElementById('cancel-detail');

    if (viewButtons) {
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                fetch(`/categories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('detail-name').textContent = data.name;
                        document.getElementById('detail-description').textContent = data.description;
                        detailCategoryModal.classList.remove('hidden');
                    });
            });
        });
    }

    if (cancelDetail) {
        cancelDetail.addEventListener('click', function() {
            detailCategoryModal.classList.add('hidden');
        });
    }

    // Sembunyikan modal detail saat tombol close diklik
    if (closeDetailModal) {
        closeDetailModal.addEventListener('click', function() {
            detailCategoryModal.classList.add('hidden');
        });
    }

    // Sembunyikan modal detail saat mengklik di luar modal
    if (detailCategoryModal) {
        detailCategoryModal.addEventListener('click', function(event) {
            if (event.target === detailCategoryModal) {
                detailCategoryModal.classList.add('hidden');
            }
        });
    }
});

</script>

@endsection
