@extends('main.main')

@section('page-title', 'Loans')
@section('page-subtitle', 'Manage book loans and returns')

@section('content')
    
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Loans Management</h1>
            <p class="text-gray-600 mt-2">Track and manage book borrowing activities</p>
        </div>
        
        <!-- Create Loan Button -->
        <a href="{{ route('loans.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fas fa-plus mr-2"></i>
            Create Loan
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </span>
        </div>
    @endif

    <!-- Loans Table Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
            <div class="flex items-center space-x-2">
                <i class="fas fa-book-reader text-amber-600"></i>
                <h3 class="text-lg font-semibold text-gray-900">All Loans</h3>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Borrower</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Book</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Loan Date</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Return Date</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Status</span>
                                <i class="fas fa-sort text-gray-400"></i>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Processed By
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($loans as $loan)
                        <tr class="hover:bg-amber-50/50 transition-colors duration-200">
                            <!-- Borrower -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $loan->borrower->full_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $loan->borrower->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Book -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($loan->book->book_image)
                                        <div class="h-10 w-7 rounded-lg overflow-hidden mr-3 shadow-sm">
                                            <img src="{{ asset('storage/' . $loan->book->book_image) }}" alt="Book cover" class="h-full w-full object-cover">
                                        </div>
                                    @else
                                        <div class="h-10 w-7 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg flex items-center justify-center mr-3 shadow-sm">
                                            <i class="fas fa-book text-white text-xs"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $loan->book->book_title }}</div>
                                        <div class="text-xs text-gray-500">by {{ $loan->book->author }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Loan Date -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $loan->loan_date->format('M d, Y') }}
                            </td>

                            <!-- Return Date -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $loan->return_date->format('M d, Y') }}
                                @if($loan->status !== 'returned' && $loan->return_date->isPast())
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        Overdue
                                    </span>
                                @endif
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($loan->status === 'borrowed')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-book-open mr-1"></i>
                                        Borrowed
                                    </span>
                                @elseif($loan->status === 'returned')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Returned
                                    </span>
                                @elseif($loan->status === 'late')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-clock mr-1"></i>
                                        Late
                                    </span>
                                @endif
                            </td>

                            <!-- Processed By -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $loan->processedBy->first_name }} {{ $loan->processedBy->last_name }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('loans.edit', $loan->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs font-medium rounded-md transition-colors duration-200"
                                       title="Edit Loan">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ route('loans.destroy', $loan->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this loan? This action cannot be undone.')"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium rounded-md transition-colors duration-200"
                                                title="Delete Loan">
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
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-20 w-20 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-book-reader text-3xl text-amber-500"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Loans Found</h3>
                                    <p class="text-gray-600 mb-6 max-w-md">
                                        Start managing book loans by creating the first loan transaction.
                                    </p>
                                    <a href="{{ route('loans.create') }}" 
                                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <i class="fas fa-plus mr-2"></i>
                                        Create First Loan
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        @if($loans->count() > 0)
        <div class="px-6 py-3 bg-gray-50/80 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">{{ $loans->count() }}</span> loans
            </div>
            <div class="text-sm text-gray-500">
                <!-- Pagination will be added later -->
                <span>Page 1 of 1</span>
            </div>
        </div>
        @endif
    </div>

@endsection
