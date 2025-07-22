@extends('main.main')

@section('page-title', 'Categories')
@section('page-subtitle', 'Manage and organize your book categories')

@section('content')
    
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Categories Management</h1>
            <p class="text-gray-600 mt-2">Organize and manage book categories for your library collection</p>
        </div>
        
        <!-- Create Category Button -->
        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fas fa-plus mr-2"></i>
            Create Category
        </a>
    </div>

    <!-- Categories Table Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
            <div class="flex items-center space-x-2">
                <i class="fas fa-tags text-amber-600"></i>
                <h3 class="text-lg font-semibold text-gray-900">All Categories</h3>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>ID</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Category Name</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Description</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($categories as $category)
                        <tr class="hover:bg-amber-50/50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $category->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-tag text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $category->category_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 max-w-xs">
                                <p class="truncate">{{ $category->category_description ?? 'No description' }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $category->created_at ? $category->created_at->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs font-medium rounded-md transition-colors duration-200"
                                       title="Edit Category">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this category? This action cannot be undone.')"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium rounded-md transition-colors duration-200"
                                                title="Delete Category">
                                            <i class="fas fa-trash mr-1"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-20 w-20 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-tags text-3xl text-amber-500"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Categories Found</h3>
                                    <p class="text-gray-600 mb-6 max-w-md">
                                        Get started by creating your first book category. Categories help organize your library collection efficiently.
                                    </p>
                                    <a href="{{ route('categories.create') }}" 
                                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <i class="fas fa-plus mr-2"></i>
                                        Create First Category
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer with Pagination (placeholder) -->
        @if($categories->count() > 0)
        <div class="px-6 py-3 bg-gray-50/80 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">{{ $categories->count() }}</span> categories
            </div>
            <div class="text-sm text-gray-500">
                <!-- Pagination will be added later -->
                <span>Page 1 of 1</span>
            </div>
        </div>
        @endif
    </div>
    </div>



@endsection