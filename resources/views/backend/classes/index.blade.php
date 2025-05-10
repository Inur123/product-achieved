@extends('backend.layouts.app')
@section('content')
<script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
        <!-- Notifikasi Sukses -->
        @if (session('success') || session('error') || session('warning') || session('info'))
            <div id="alert" class="fixed top-4 right-4 md:right-10 z-50">
                <div class="bg-{{ session('success') ? 'green' : (session('error') ? 'red' : (session('warning') ? 'yellow' : 'blue')) }}-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between w-full md:w-auto"
                    role="alert">
                    <span
                        class="mr-2">{{ session('success') ?? (session('error') ?? (session('warning') ?? session('info'))) }}</span>
                    <button type="button" class="close-alert text-white hover:text-gray-300 focus:outline-none">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Classes</h2>
            <button id="add-class-btn"
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Class
            </button>
        </div>

        <!-- Classes Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Excerpt</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($classes as $index => $class)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    {{ $class->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ Str::limit($class->excerpt, 50, '...') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full {{ $class->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $class->status }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-500 hover:text-opacity-70 mr-3 view-class-btn"
                                        data-id="{{ $class->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                        </svg>
                                    </button>
                                    <button class="text-secondary hover:text-opacity-70 mr-3 edit-class-btn"
                                        data-id="{{ $class->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-500 hover:text-opacity-70 delete-class-btn"
                                        data-id="{{ $class->id }}">
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
                    {{ ($classes->currentPage() - 1) * $classes->perPage() + 1 }}-{{ min($classes->currentPage() * $classes->perPage(), $classes->total()) }}
                    of {{ $classes->total() }} classes</p>
                <div class="flex space-x-2">
                    <a href="{{ $classes->previousPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $classes->onFirstPage() ? 'disabled' : '' }}">Previous</a>

                    @php
                        $start = max($classes->currentPage() - 2, 1);
                        $end = min($start + 4, $classes->lastPage());

                        if ($end - $start < 4 && $classes->lastPage() > 5) {
                            $start = max($classes->lastPage() - 4, 1);
                            $end = $classes->lastPage();
                        }
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $classes->url(1) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">1</a>
                        @if ($start > 2)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $classes->url($i) }}"
                            class="px-3 py-1 rounded {{ $classes->currentPage() == $i ? 'bg-primary text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">{{ $i }}</a>
                    @endfor

                    @if ($end < $classes->lastPage())
                        @if ($end < $classes->lastPage() - 1)
                            <span class="px-3 py-1 text-gray-600">...</span>
                        @endif
                        <a href="{{ $classes->url($classes->lastPage()) }}"
                            class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">{{ $classes->lastPage() }}</a>
                    @endif

                    <a href="{{ $classes->nextPageUrl() }}"
                        class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-50 {{ $classes->hasMorePages() ? '' : 'disabled' }}">Next</a>
                </div>
            </div>
        </div>

        <!-- Add Class Modal -->
        <div id="add-class-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Add New Class</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="class-form" action="{{ route('classes.store') }}" method="POST" class="grid grid-cols-2 gap-4">
                        @csrf
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                placeholder="Enter class title"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="active">Active</option>
                                <option value="nonactive">Nonactive</option>
                            </select>
                        </div>
                        <div class="col-span-2 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" placeholder="Enter class excerpt"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary tinymce-editor">{{ old('excerpt') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" id="description" rows="3" placeholder="Enter class description"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary tinymce-editor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-span-2 flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-add"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Save Class</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Class Modal -->
        <div id="edit-class-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Edit Class</h3>
                        <button id="close-edit-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="edit-class-form" action="" method="POST" class="grid grid-cols-2 gap-4">
                        @csrf
                        @method('PUT')
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" name="title" id="edit-title" placeholder="Enter class title"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="edit-status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="active">Active</option>
                                <option value="nonactive">Nonactive</option>
                            </select>
                        </div>
                        <div class="col-span-2 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                                <textarea name="excerpt" id="edit-excerpt" rows="3" placeholder="Enter class excerpt"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary tinymce-editor"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" id="edit-description" rows="3" placeholder="Enter class description"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary tinymce-editor"></textarea>
                            </div>
                        </div>
                        <div class="col-span-2 flex justify-end space-x-4 pt-4">
                            <button type="button" id="cancel-edit"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90">Update Class</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Detail Class Modal -->
        <div id="detail-class-modal" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Class Details</h3>
                        <button id="close-detail-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <p id="detail-title" class="text-sm text-gray-600"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                            <div id="detail-excerpt" class="text-sm text-gray-600"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <div id="detail-description" class="text-sm text-gray-600"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <p id="detail-status" class="text-sm text-gray-600"></p>
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
            // Initialize TinyMCE
            tinymce.init({
                selector: '.tinymce-editor',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                height: 300,
                menubar: false,
                branding: false,
                statusbar: false,
                resize: true
            });

            // Ambil elemen notifikasi
            const alertElement = document.getElementById('alert');
            const closeAlertButton = document.querySelector('.close-alert');

            // Jika notifikasi ada
            if (alertElement) {
                // Tutup notifikasi setelah 5 detik
                setTimeout(() => {
                    alertElement.remove();
                }, 5000);

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
            // Tampilkan modal saat tombol "Add New Class" diklik
            const addClassBtn = document.getElementById('add-class-btn');
            const addClassModal = document.getElementById('add-class-modal');
            const closeModal = document.getElementById('close-modal');
            const cancelAdd = document.getElementById('cancel-add');

            if (addClassBtn) {
                addClassBtn.addEventListener('click', function() {
                    addClassModal.classList.remove('hidden');
                    // TinyMCE will be initialized on page load, so we don't need to initialize it here
                });
            }

            // Sembunyikan modal saat tombol "Close" atau "Cancel" diklik
            if (closeModal) {
                closeModal.addEventListener('click', function() {
                    addClassModal.classList.add('hidden');
                });
            }

            if (cancelAdd) {
                cancelAdd.addEventListener('click', function() {
                    addClassModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal saat mengklik di luar modal
            if (addClassModal) {
                addClassModal.addEventListener('click', function(event) {
                    if (event.target === addClassModal) {
                        addClassModal.classList.add('hidden');
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
            const editButtons = document.querySelectorAll('.edit-class-btn');
            const editClassModal = document.getElementById('edit-class-modal');
            const closeEditModal = document.getElementById('close-edit-modal');
            const cancelEdit = document.getElementById('cancel-edit');

            if (editButtons) {
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const classId = this.getAttribute('data-id');
                        fetch(`/classes/${classId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Isi form dengan data kelas
                                document.getElementById('edit-title').value = data.title;

                                // Set content for TinyMCE editors
                                if (tinymce.get('edit-excerpt')) {
                                    tinymce.get('edit-excerpt').setContent(data.excerpt || '');
                                }

                                if (tinymce.get('edit-description')) {
                                    tinymce.get('edit-description').setContent(data.description || '');
                                }

                                document.getElementById('edit-status').value = data.status;

                                // Set action form
                                document.getElementById('edit-class-form').action = `/classes/${classId}`;

                                // Tampilkan modal
                                editClassModal.classList.remove('hidden');
                            });
                    });
                });
            }

            // Sembunyikan modal edit saat tombol close atau cancel diklik
            if (closeEditModal) {
                closeEditModal.addEventListener('click', function() {
                    editClassModal.classList.add('hidden');
                });
            }

            if (cancelEdit) {
                cancelEdit.addEventListener('click', function() {
                    editClassModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal edit saat mengklik di luar modal
            if (editClassModal) {
                editClassModal.addEventListener('click', function(event) {
                    if (event.target === editClassModal) {
                        editClassModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan modal detail saat tombol detail diklik
            const viewButtons = document.querySelectorAll('.view-class-btn');
            const detailClassModal = document.getElementById('detail-class-modal');
            const closeDetailModal = document.getElementById('close-detail-modal');
            const cancelDetail = document.getElementById('cancel-detail');

            if (viewButtons) {
                viewButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const classId = this.getAttribute('data-id');
                        fetch(`/classes/${classId}`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('detail-title').textContent = data.title;
                                document.getElementById('detail-excerpt').innerHTML = data.excerpt || 'No excerpt available';
                                document.getElementById('detail-description').innerHTML = data.description || 'No description available';
                                document.getElementById('detail-status').textContent = data.status;
                                detailClassModal.classList.remove('hidden');
                            });
                    });
                });
            }

            // Sembunyikan modal detail saat tombol close atau cancel diklik
            if (closeDetailModal) {
                closeDetailModal.addEventListener('click', function() {
                    detailClassModal.classList.add('hidden');
                });
            }

            if (cancelDetail) {
                cancelDetail.addEventListener('click', function() {
                    detailClassModal.classList.add('hidden');
                });
            }

            // Sembunyikan modal detail saat mengklik di luar modal
            if (detailClassModal) {
                detailClassModal.addEventListener('click', function(event) {
                    if (event.target === detailClassModal) {
                        detailClassModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani tombol delete
            const deleteButtons = document.querySelectorAll('.delete-class-btn');

            if (deleteButtons) {
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const classId = this.getAttribute('data-id');

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
                                fetch(`/classes/${classId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success !== false) {
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
