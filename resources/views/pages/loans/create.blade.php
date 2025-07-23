@extends('main.main')

@section('page-title', 'Create Loan')
@section('page-subtitle', 'Register a new book loan transaction')

@section('content')
    
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('loans') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-600 transition-colors duration-200">
                    <i class="fas fa-book-reader mr-2"></i>
                    Loans
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Create New Loan</span>
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
                <h1 class="text-3xl font-bold text-gray-900">Create New Loan</h1>
                <p class="text-gray-600 mt-1">Register a new book borrowing transaction</p>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-amber-100 overflow-hidden">
            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-book-reader text-amber-600"></i>
                    <h3 class="text-lg font-semibold text-gray-900">Loan Information</h3>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('loans.store') }}" method="POST" class="p-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Borrower Field -->
                    <div>
                        <label for="borrower_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-user text-amber-600 mr-2"></i>
                                Borrower
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <select 
                            id="borrower_id" 
                            name="borrower_id" 
                            required
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                        >
                            <option value="">Select borrower</option>
                            @foreach($borrowers as $borrower)
                                <option value="{{ $borrower->id }}" {{ old('borrower_id') == $borrower->id ? 'selected' : '' }}>
                                    {{ $borrower->full_name }} - {{ $borrower->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('borrower_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Book Field -->
                    <div>
                        <label for="book_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-book text-amber-600 mr-2"></i>
                                Book
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <select 
                            id="book_id" 
                            name="book_id" 
                            required
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                        >
                            <option value="">Select book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                    {{ $book->book_title }} by {{ $book->author }} (Stock: {{ $book->book_stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Loan Date Field -->
                    <div>
                        <label for="loan_date" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-calendar-alt text-amber-600 mr-2"></i>
                                Loan Date
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input 
                            type="date" 
                            id="loan_date" 
                            name="loan_date" 
                            required
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                            value="{{ old('loan_date', date('Y-m-d')) }}"
                        >
                        @error('loan_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Return Date Field -->
                    <div>
                        <label for="return_date" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-calendar-check text-amber-600 mr-2"></i>
                                Return Date
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input 
                            type="date" 
                            id="return_date" 
                            name="return_date" 
                            required
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                            value="{{ old('return_date', date('Y-m-d', strtotime('+14 days'))) }}"
                        >
                        @error('return_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Default: 14 days from loan date</p>
                    </div>

                    <!-- Status Field -->
                    <div class="md:col-span-2">
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-tag text-amber-600 mr-2"></i>
                                Status
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <select 
                            id="status" 
                            name="status" 
                            required
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                        >
                            <option value="">Select status</option>
                            <option value="borrowed" {{ old('status', 'borrowed') == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="returned" {{ old('status') == 'returned' ? 'selected' : '' }}>Returned</option>
                            <option value="late" {{ old('status') == 'late' ? 'selected' : '' }}>Late</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200">
                    <!-- Cancel Button -->
                    <a href="{{ route('loans') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Loans
                    </a>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Create Loan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Auto-update return date script -->
    <script>
        const loanDateInput = document.getElementById('loan_date');
        const returnDateInput = document.getElementById('return_date');

        loanDateInput.addEventListener('change', function() {
            if (this.value) {
                const loanDate = new Date(this.value);
                const returnDate = new Date(loanDate);
                returnDate.setDate(loanDate.getDate() + 14); // Add 14 days
                
                const formattedDate = returnDate.toISOString().split('T')[0];
                returnDateInput.value = formattedDate;
            }
        });
    </script>

@endsection
