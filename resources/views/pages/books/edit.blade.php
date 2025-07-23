@extends('main.main')

@section('page-title', 'Edit Book')
@section('page-subtitle', 'Update book information in your library collection')

@section('content')
    
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('books') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-600 transition-colors duration-200">
                    <i class="fas fa-book-open mr-2"></i>
                    Books
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Book</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="h-12 w-12 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-edit text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Book</h1>
                <p class="text-gray-600 mt-1">Update book information in your library collection</p>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Book Cover -->
            <div class="lg:col-span-1">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
                    <!-- Cover Header -->
                    <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-image text-amber-600"></i>
                            <h3 class="text-lg font-semibold text-gray-900">Book Cover</h3>
                        </div>
                    </div>

                    <!-- Cover Upload Area -->
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Image Preview -->
                            <div class="aspect-[3/4] bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden" id="imagePreview">
                                @if($book->book_image)
                                    <img id="previewImage" src="{{ asset('storage/' . $book->book_image) }}" class="w-full h-full object-cover" alt="Book cover">
                                    <div class="text-center hidden" id="placeholderContent">
                                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                        <p class="text-sm text-gray-500">No image selected</p>
                                    </div>
                                @else
                                    <div class="text-center" id="placeholderContent">
                                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                                        <p class="text-sm text-gray-500">No image selected</p>
                                    </div>
                                    <img id="previewImage" class="w-full h-full object-cover hidden" alt="Book cover preview">
                                @endif
                            </div>

                            @error('book_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="text-xs text-gray-500">
                                Supported formats: JPG, PNG, GIF. Max size: 2MB.
                            </p>

                            <!-- Remove Image Button -->
                            <button type="button" id="removeImageBtn" class="w-full px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition-colors duration-200 {{ $book->book_image ? '' : 'hidden' }}" onclick="removeBookImage()">
                                <i class="fas fa-trash mr-2"></i>
                                Remove Image
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Book Information -->
            <div class="lg:col-span-2">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
                    <!-- Form Header -->
                    <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-edit text-amber-600"></i>
                            <h3 class="text-lg font-semibold text-gray-900">Book Information</h3>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Book Title Field -->
                            <div class="md:col-span-2">
                                <label for="book_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-book text-amber-600 mr-2"></i>
                                        Book Title
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input 
                                    type="text" 
                                    id="book_title" 
                                    name="book_title" 
                                    required 
                                    maxlength="255"
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                    placeholder="Enter book title (e.g., The Great Gatsby)"
                                    value="{{ old('book_title', $book->book_title) }}"
                                >
                                @error('book_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    <span id="titleCount">{{ strlen($book->book_title) }}</span>/255 characters
                                </p>
                            </div>

                            <!-- Author Field -->
                            <div>
                                <label for="author" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-user-edit text-amber-600 mr-2"></i>
                                        Author
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input 
                                    type="text" 
                                    id="author" 
                                    name="author" 
                                    required 
                                    maxlength="255"
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                    placeholder="Enter author name (e.g., F. Scott Fitzgerald)"
                                    value="{{ old('author', $book->author) }}"
                                >
                                @error('author')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Publisher Field -->
                            <div>
                                <label for="publisher" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-building text-amber-600 mr-2"></i>
                                        Publisher
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input 
                                    type="text" 
                                    id="publisher" 
                                    name="publisher" 
                                    required 
                                    maxlength="255"
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                    placeholder="Enter publisher name (e.g., Penguin Books)"
                                    value="{{ old('publisher', $book->publisher) }}"
                                >
                                @error('publisher')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Year Published Field -->
                            <div>
                                <label for="year_published" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar text-amber-600 mr-2"></i>
                                        Year Published
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input 
                                    type="number" 
                                    id="year_published" 
                                    name="year_published" 
                                    required 
                                    min="1000"
                                    max="{{ date('Y') + 5 }}"
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                    placeholder="Enter year (e.g., {{ date('Y') }})"
                                    value="{{ old('year_published', $book->year_published) }}"
                                >
                                @error('year_published')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Book Genre Field -->
                            <div>
                                <label for="book_genre" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-theater-masks text-amber-600 mr-2"></i>
                                        Genre
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <select 
                                    id="book_genre" 
                                    name="book_genre" 
                                    required
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                                >
                                    <option value="">Select genre</option>
                                    <option value="Fiction" {{ old('book_genre', $book->book_genre) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                    <option value="Non-Fiction" {{ old('book_genre', $book->book_genre) == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                    <option value="Mystery" {{ old('book_genre', $book->book_genre) == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                                    <option value="Romance" {{ old('book_genre', $book->book_genre) == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Sci-Fi" {{ old('book_genre', $book->book_genre) == 'Sci-Fi' ? 'selected' : '' }}>Science Fiction</option>
                                    <option value="Fantasy" {{ old('book_genre', $book->book_genre) == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                    <option value="Biography" {{ old('book_genre', $book->book_genre) == 'Biography' ? 'selected' : '' }}>Biography</option>
                                    <option value="History" {{ old('book_genre', $book->book_genre) == 'History' ? 'selected' : '' }}>History</option>
                                    <option value="Self-Help" {{ old('book_genre', $book->book_genre) == 'Self-Help' ? 'selected' : '' }}>Self-Help</option>
                                    <option value="Educational" {{ old('book_genre', $book->book_genre) == 'Educational' ? 'selected' : '' }}>Educational</option>
                                </select>
                                @error('book_genre')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Category Field -->
                            <div>
                                <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-tags text-amber-600 mr-2"></i>
                                        Category
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <select 
                                    id="category_id" 
                                    name="category_id" 
                                    required
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                                >
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Book Stock Field -->
                            <div>
                                <label for="book_stock" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <i class="fas fa-boxes text-amber-600 mr-2"></i>
                                        Stock Quantity
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input 
                                    type="number" 
                                    id="book_stock" 
                                    name="book_stock" 
                                    required 
                                    min="0"
                                    max="9999"
                                    class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                    placeholder="Enter stock quantity (e.g., 5)"
                                    value="{{ old('book_stock', $book->book_stock) }}"
                                >
                                @error('book_stock')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Book Image Upload Field -->
                        <div class="mt-6">
                            <label for="book_image" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-image text-amber-600 mr-2"></i>
                                    Book Cover Image
                                </span>
                            </label>
                            <input 
                                type="file" 
                                id="book_image" 
                                name="book_image" 
                                accept="image/*"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                                onchange="previewBookImage(this)"
                            >
                            @error('book_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Supported formats: JPG, PNG, GIF. Max size: 2MB. Leave empty to keep current image.
                            </p>
                        </div>

                        <!-- Book Description Field -->
                        <div class="mt-6">
                            <label for="book_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-align-left text-amber-600 mr-2"></i>
                                    Book Description
                                </span>
                            </label>
                            <textarea 
                                id="book_description" 
                                name="book_description" 
                                rows="4"
                                maxlength="1000"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400 resize-none"
                                placeholder="Enter book description, synopsis, or summary..."
                            >{{ old('book_description', $book->book_description) }}</textarea>
                            @error('book_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <span id="descCount">{{ strlen($book->book_description ?? '') }}</span>/1000 characters (Optional)
                            </p>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200">
                            <!-- Cancel Button -->
                            <a href="{{ route('books') }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Books
                            </a>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="inline-flex items-center px-8 py-3 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Update Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Character Counter Script -->
    <script>
        // Book Title Counter
        const titleInput = document.getElementById('book_title');
        const titleCounter = document.getElementById('titleCount');
        
        if (titleInput && titleCounter) {
            titleInput.addEventListener('input', function() {
                const count = this.value.length;
                titleCounter.textContent = count;
                
                if (count > 200) {
                    titleCounter.parentElement.classList.remove('text-gray-500');
                    titleCounter.parentElement.classList.add('text-amber-600');
                } else {
                    titleCounter.parentElement.classList.remove('text-amber-600');
                    titleCounter.parentElement.classList.add('text-gray-500');
                }
            });
        }

        // Description Counter
        const descInput = document.getElementById('book_description');
        const descCounter = document.getElementById('descCount');
        
        if (descInput && descCounter) {
            descInput.addEventListener('input', function() {
                const count = this.value.length;
                descCounter.textContent = count;
                
                if (count > 800) {
                    descCounter.parentElement.classList.remove('text-gray-500');
                    descCounter.parentElement.classList.add('text-amber-600');
                } else {
                    descCounter.parentElement.classList.remove('text-amber-600');
                    descCounter.parentElement.classList.add('text-gray-500');
                }
            });
        }

        // Image Preview Function
        function previewBookImage(input) {
            const file = input.files[0];
            const previewImage = document.getElementById('previewImage');
            const placeholderContent = document.getElementById('placeholderContent');
            const removeBtn = document.getElementById('removeImageBtn');

            if (file) {
                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPG, PNG, GIF)');
                    input.value = '';
                    return;
                }

                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Image size must be less than 2MB');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    placeholderContent.classList.add('hidden');
                    removeBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove Image Function
        function removeBookImage() {
            const input = document.getElementById('book_image');
            const previewImage = document.getElementById('previewImage');
            const placeholderContent = document.getElementById('placeholderContent');
            const removeBtn = document.getElementById('removeImageBtn');

            input.value = '';
            previewImage.src = '';
            previewImage.classList.add('hidden');
            placeholderContent.classList.remove('hidden');
            removeBtn.classList.add('hidden');
        }
    </script>

@endsection
