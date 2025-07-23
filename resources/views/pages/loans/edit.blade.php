@extends('main.main')

@section('page-title', 'Edit Loan')
@section('page-subtitle', 'Update loan transaction details')

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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Loan</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="h-12 w-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-edit text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Loan</h1>
                <p class="text-gray-600 mt-1">Update book borrowing transaction details</p>
            </div>
        </div>

        <!-- Current Loan Info -->
        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mt-4">
            <div class="flex items-center space-x-2 mb-2">
                <i class="fas fa-info-circle text-amber-600"></i>
                <span class="font-medium text-amber-800">Current Loan Details</span>
            </div>
            <div class="text-sm text-amber-700">
                <strong>{{ $loan->borrower->full_name }}</strong> borrowed 
                <strong>{{ $loan->book->book_title }}</strong> on 
                <strong>{{ $loan->loan_date->format('M d, Y') }}</strong>
                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium 
                    @if($loan->status === 'borrowed') bg-yellow-100 text-yellow-800
                    @elseif($loan->status === 'returned') bg-green-100 text-green-800  
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($loan->status) }}
                </span>
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
                    <h3 class="text-lg font-semibold text-gray-900">Update Loan Information</h3>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

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
                                <option value="{{ $borrower->id }}" 
                                    {{ old('borrower_id', $loan->borrower_id) == $borrower->id ? 'selected' : '' }}>
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
                                <option value="{{ $book->id }}" 
                                    {{ old('book_id', $loan->book_id) == $book->id ? 'selected' : '' }}>
                                    {{ $book->book_title }} by {{ $book->author }} 
                                    @if($book->id === $loan->book_id)
                                        (Current Book)
                                    @else
                                        (Stock: {{ $book->book_stock }})
                                    @endif
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
                            value="{{ old('loan_date', $loan->loan_date->format('Y-m-d')) }}"
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
                            value="{{ old('return_date', $loan->return_date->format('Y-m-d')) }}"
                        >
                        @error('return_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if($loan->status !== 'returned' && $loan->return_date->isPast())
                            <p class="mt-1 text-xs text-red-600">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                This loan is overdue!
                            </p>
                        @endif
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
                            <option value="borrowed" {{ old('status', $loan->status) == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="returned" {{ old('status', $loan->status) == 'returned' ? 'selected' : '' }}>Returned</option>
                            <option value="late" {{ old('status', $loan->status) == 'late' ? 'selected' : '' }}>Late</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        
                        <!-- Status change warning -->
                        <div id="statusWarning" class="mt-2 hidden">
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                                    <div class="text-sm text-yellow-800">
                                        <p class="font-medium">Status Change Notice:</p>
                                        <p id="statusWarningText"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Loan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Status change warning script -->
    <script>
        const statusSelect = document.getElementById('status');
        const statusWarning = document.getElementById('statusWarning');
        const statusWarningText = document.getElementById('statusWarningText');
        const originalStatus = '{{ $loan->status }}';

        statusSelect.addEventListener('change', function() {
            const newStatus = this.value;
            
            if (newStatus && newStatus !== originalStatus) {
                let warningMessage = '';
                
                if (originalStatus !== 'returned' && newStatus === 'returned') {
                    warningMessage = 'Changing status to "Returned" will increase the book stock.';
                } else if (originalStatus === 'returned' && newStatus !== 'returned') {
                    warningMessage = 'Changing status from "Returned" will decrease the book stock.';
                }
                
                if (warningMessage) {
                    statusWarningText.textContent = warningMessage;
                    statusWarning.classList.remove('hidden');
                } else {
                    statusWarning.classList.add('hidden');
                }
            } else {
                statusWarning.classList.add('hidden');
            }
        });

        // Auto-update return date script
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
