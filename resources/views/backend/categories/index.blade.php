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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categories as $index => $category)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6 flex items-start space-x-4">
                        <!-- Category Icon/Badge -->
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            @if($category->icon)
                                {!! $category->icon !!}
                            @else
                                <!-- Default Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <!-- Category Name -->
                            <h3 class="text-lg font-bold text-gray-800">{{ $category->name }}</h3>
                            <!-- Category Description -->
                            <p class="text-gray-600 text-sm mt-1">{{ $category->description }}</p>
                            <div class="mt-4 flex items-center text-sm text-gray-500">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ $category->products->count() }} Products
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-3 bg-gray-50 flex justify-end space-x-2">
                        <!-- Edit Button -->
                        <button class="text-secondary hover:text-opacity-70 edit-category-btn" data-id="{{ $category->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                        <!-- Delete Button -->
                        <button class="text-red-500 hover:text-opacity-70 delete-category-btn" data-id="{{ $category->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Category Modal -->
        <div id="add-category-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Add New Category</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="category-form" action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter category name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="3" placeholder="Enter category description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon (SVG Code)</label>
                            <textarea name="icon" id="icon" rows="3" placeholder="Paste SVG code here"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">{{ old('icon') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Example: <code>&lt;svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"&gt; ... &lt;/svg&gt;</code></p>
                        </div>

                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon Preview</label>
                            <div id="icon-preview" class="w-12 h-12 flex items-center justify-center border border-gray-300 rounded-lg p-2">
                                <span class="text-gray-500">No icon</span>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-add" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Edit Category Modal -->
        <div id="edit-category-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Edit Category</h3>
                        <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="edit-category-form" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                            <input type="text" name="name" id="edit-name" placeholder="Enter category name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="edit-description" rows="3" placeholder="Enter category description"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon (SVG Code)</label>
                            <textarea name="icon" id="edit-icon" rows="3" placeholder="Paste SVG code here"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            <p class="text-sm text-gray-500 mt-1">Example: <code>&lt;svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"&gt; ... &lt;/svg&gt;</code></p>
                        </div>

                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon Preview</label>
                            <div id="edit-icon-preview" class="w-12 h-12 flex items-center justify-center border border-gray-300 rounded-lg p-2">
                                <span class="text-gray-500">No icon</span>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-edit"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Update Category</button>
                        </div>
                    </form>
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
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('icon-preview');

            if (iconInput) {
                iconInput.addEventListener('input', function() {
                    const svgCode = iconInput.value.trim();

                    if (svgCode) {
                        iconPreview.innerHTML = svgCode;
                    } else {
                        iconPreview.innerHTML = '<span class="text-gray-500">No icon</span>';
                    }
                });
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-category-btn');
        const editCategoryModal = document.getElementById('edit-category-modal');
        const closeEditModal = document.getElementById('close-edit-modal');
        const cancelEdit = document.getElementById('cancel-edit');
        const iconPreview = document.getElementById('edit-icon-preview');
        const iconTextarea = document.getElementById('edit-icon');

        if (editButtons) {
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const categoryId = this.getAttribute('data-id');
                    fetch(`/categories/${categoryId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('edit-name').value = data.name;
                            document.getElementById('edit-description').value = data.description;
                            document.getElementById('edit-category-form').action = `/categories/${categoryId}`;

                            // Isi textarea dengan kode SVG
                            iconTextarea.value = data.icon;

                            // Tampilkan preview ikon SVG
                            if (data.icon) {
                                iconPreview.innerHTML = data.icon;
                            } else {
                                iconPreview.innerHTML = '<span class="text-gray-500">No icon</span>';
                            }

                            editCategoryModal.classList.remove('hidden');
                        });
                });
            });
        }

        // Update preview saat textarea SVG diubah
        iconTextarea.addEventListener('input', function () {
            if (iconTextarea.value.trim() !== '') {
                iconPreview.innerHTML = iconTextarea.value;
            } else {
                iconPreview.innerHTML = '<span class="text-gray-500">No icon</span>';
            }
        });

        // Sembunyikan modal edit saat tombol close atau cancel diklik
        if (closeEditModal) {
            closeEditModal.addEventListener('click', function () {
                editCategoryModal.classList.add('hidden');
            });
        }

        if (cancelEdit) {
            cancelEdit.addEventListener('click', function () {
                editCategoryModal.classList.add('hidden');
            });
        }

        // Sembunyikan modal edit saat mengklik di luar modal
        if (editCategoryModal) {
            editCategoryModal.addEventListener('click', function (event) {
                if (event.target === editCategoryModal) {
                    editCategoryModal.classList.add('hidden');
                }
            });
        }
    });
</script>

    {{-- Destror --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani tombol delete
            const deleteButtons = document.querySelectorAll('.delete-category-btn');

            if (deleteButtons) {
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const categoryId = this.getAttribute('data-id');

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
                                fetch(`/categories/${categoryId}`, {
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
