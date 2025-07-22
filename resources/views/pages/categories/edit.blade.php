@extends('main.main')

@section('page-title', 'Create Category')
@section('page-subtitle', 'Add a new category to organize your library collection')

@section('content')
    
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('categories') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-600 transition-colors duration-200">
                    <i class="fas fa-tags mr-2"></i>
                    Categories
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Category</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="h-12 w-12 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-plus text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Category</h1>
                <p class="text-gray-600 mt-1">Edit the category to better organize your library books</p>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <div class="max-w-4xl mx-auto">
        <div>
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
                <!-- Form Header -->
                <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-edit text-amber-600"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Category Information</h3>
                    </div>
                </div>

                <!-- Form Content -->
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Category Name Field -->
                    <div>
                        <label for="category_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-tag text-amber-600 mr-2"></i>
                                Category Name
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input 
                            type="text" 
                            id="category_name" 
                            name="category_name" 
                            required 
                            maxlength="100"
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                            placeholder="Enter category name (e.g., Fiction, Science, History)"
                            value="{{ $category->category_name }}"
                        >
                        @error('category_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">
                            <span id="nameCount">0</span>/100 characters
                        </p>
                    </div>

                    <!-- Category Description Field -->
                    <div>
                        <label for="category_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-align-left text-amber-600 mr-2"></i>
                                Category Description
                            </span>
                        </label>
                        <textarea 
                            id="category_description" 
                            name="category_description" 
                            rows="4"
                            maxlength="500"
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400 resize-none"
                            placeholder="Describe this category and what types of books it will contain..."
                        >{{ $category->category_description }}</textarea>
                        @error('category_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">
                            <span id="descCount">0</span>/500 characters (Optional)
                        </p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-gray-200">
                        <!-- Cancel Button -->
                        <a href="{{ route('categories') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Categories
                        </a>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Character Counter Script -->
    <script>
        // Category Name Counter
        const nameInput = document.getElementById('category_name');
        const nameCounter = document.getElementById('nameCount');
        
        nameInput.addEventListener('input', function() {
            const count = this.value.length;
            nameCounter.textContent = count;
            
            if (count > 80) {
                nameCounter.parentElement.classList.remove('text-gray-500');
                nameCounter.parentElement.classList.add('text-amber-600');
            } else {
                nameCounter.parentElement.classList.remove('text-amber-600');
                nameCounter.parentElement.classList.add('text-gray-500');
            }
        });

        // Category Description Counter
        const descInput = document.getElementById('category_description');
        const descCounter = document.getElementById('descCount');
        
        descInput.addEventListener('input', function() {
            const count = this.value.length;
            descCounter.textContent = count;
            
            if (count > 400) {
                descCounter.parentElement.classList.remove('text-gray-500');
                descCounter.parentElement.classList.add('text-amber-600');
            } else {
                descCounter.parentElement.classList.remove('text-amber-600');
                descCounter.parentElement.classList.add('text-gray-500');
            }
        });
    </script>

@endsection
