@extends('main.main')

@section('page-title', 'Create Borrower')
@section('page-subtitle', 'Add a new borrower to organize your library collection')

@section('content')
    
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('borrowers') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-600 transition-colors duration-200">
                    <i class="fas fa-users mr-2"></i>
                    Borrowers
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Create New Borrower</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="h-12 w-12 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-user-plus text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Create New Borrower</h1>
                <p class="text-gray-600 mt-1">Add a new borrower to register them in your library system</p>
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
                        <i class="fas fa-user-edit text-amber-600"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Borrower Information</h3>
                    </div>
                </div>

                <!-- Form Content -->
                <form action="{{ route('borrowers.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name Field -->
                        <div>
                            <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-user text-amber-600 mr-2"></i>
                                    Full Name
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="full_name" 
                                name="full_name" 
                                required 
                                maxlength="100"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter full name (e.g., John Doe)"
                                value="{{ old('full_name') }}"
                            >
                            @error('full_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <span id="nameCount">0</span>/100 characters
                            </p>
                        </div>

                        <!-- Identity Number Field -->
                        <div>
                            <label for="identity_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-id-card text-amber-600 mr-2"></i>
                                    Identity Number
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="identity_number" 
                                name="identity_number" 
                                required 
                                maxlength="20"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter ID number (e.g., 1234567890123456)"
                                value="{{ old('identity_number') }}"
                            >
                            @error('identity_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-envelope text-amber-600 mr-2"></i>
                                    Email Address
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                maxlength="100"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter email address (e.g., john@example.com)"
                                value="{{ old('email') }}"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-phone text-amber-600 mr-2"></i>
                                    Phone Number
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                required 
                                maxlength="20"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter phone number (e.g., +62 812 3456 7890)"
                                value="{{ old('phone') }}"
                            >
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Institution Field -->
                        <div>
                            <label for="institution" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-building text-amber-600 mr-2"></i>
                                    Institution
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="institution" 
                                name="institution" 
                                maxlength="100"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter institution/company name (Optional)"
                                value="{{ old('institution') }}"
                            >
                            @error('institution')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gender Field -->
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-venus-mars text-amber-600 mr-2"></i>
                                    Gender
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <select 
                                id="gender" 
                                name="gender" 
                                required
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                            >
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Birth Date Field -->
                        <div>
                            <label for="birth_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-calendar text-amber-600 mr-2"></i>
                                    Birth Date
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="date" 
                                id="birth_date" 
                                name="birth_date" 
                                required
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                                value="{{ old('birth_date') }}"
                            >
                            @error('birth_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Occupation Field -->
                        <div>
                            <label for="occupation" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-briefcase text-amber-600 mr-2"></i>
                                    Occupation
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="occupation" 
                                name="occupation" 
                                maxlength="100"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter occupation/job title (Optional)"
                                value="{{ old('occupation') }}"
                            >
                            @error('occupation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Address Field (Full Width) -->
                    <div class="mt-6">
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-map-marker-alt text-amber-600 mr-2"></i>
                                Address
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <textarea 
                            id="address" 
                            name="address" 
                            required
                            rows="3"
                            maxlength="500"
                            class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400 resize-none"
                            placeholder="Enter complete address..."
                        >{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">
                            <span id="addressCount">0</span>/500 characters
                        </p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200">
                        <!-- Cancel Button -->
                        <a href="{{ route('borrowers') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Borrowers
                        </a>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                            <i class="fas fa-user-plus mr-2"></i>
                            Create Borrower
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Character Counter Script -->
    <script>
        // Full Name Counter
        const nameInput = document.getElementById('full_name');
        const nameCounter = document.getElementById('nameCount');
        
        if (nameInput && nameCounter) {
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
        }

        // Address Counter
        const addressInput = document.getElementById('address');
        const addressCounter = document.getElementById('addressCount');
        
        if (addressInput && addressCounter) {
            addressInput.addEventListener('input', function() {
                const count = this.value.length;
                addressCounter.textContent = count;
                
                if (count > 400) {
                    addressCounter.parentElement.classList.remove('text-gray-500');
                    addressCounter.parentElement.classList.add('text-amber-600');
                } else {
                    addressCounter.parentElement.classList.remove('text-amber-600');
                    addressCounter.parentElement.classList.add('text-gray-500');
                }
            });
        }
    </script>

@endsection
