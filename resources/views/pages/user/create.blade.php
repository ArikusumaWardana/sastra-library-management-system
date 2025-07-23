@extends('main.main')

@section('page-title', 'Create User')
@section('page-subtitle', 'Add a new user to manage your library system')

@section('content')
    
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('users') }}" class="inline-flex items-center text-sm font-medium text-amber-700 hover:text-amber-600 transition-colors duration-200">
                    <i class="fas fa-users mr-2"></i>
                    Users
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Create New User</span>
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
                <h1 class="text-3xl font-bold text-gray-900">Create New User</h1>
                <p class="text-gray-600 mt-1">Add a new user to manage access to your library system</p>
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
                        <h3 class="text-lg font-semibold text-gray-900">User Information</h3>
                    </div>
                </div>

                <!-- Form Content -->
                <form action="{{ route('users.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name Field -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-user text-amber-600 mr-2"></i>
                                    First Name
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="first_name" 
                                name="first_name" 
                                required 
                                maxlength="50"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter first name (e.g., John)"
                                value="{{ old('first_name') }}"
                            >
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <span id="firstNameCount">0</span>/50 characters
                            </p>
                        </div>

                        <!-- Last Name Field -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-user text-amber-600 mr-2"></i>
                                    Last Name
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="text" 
                                id="last_name" 
                                name="last_name" 
                                required 
                                maxlength="50"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter last name (e.g., Doe)"
                                value="{{ old('last_name') }}"
                            >
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <span id="lastNameCount">0</span>/50 characters
                            </p>
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

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-lock text-amber-600 mr-2"></i>
                                    Password
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                minlength="8"
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                                placeholder="Enter secure password (min. 8 characters)"
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Minimum 8 characters required</p>
                        </div>

                        <!-- Role Field -->
                        <div>
                            <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-user-tag text-amber-600 mr-2"></i>
                                    Role
                                    <span class="text-red-500 ml-1">*</span>
                                </span>
                            </label>
                            <select 
                                id="role" 
                                name="role" 
                                required
                                class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm"
                            >
                                <option value="">Select role</option>
                                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                            @error('role')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <i class="fas fa-toggle-on text-amber-600 mr-2"></i>
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
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200">
                        <!-- Cancel Button -->
                        <a href="{{ route('users') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 bg-white text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Users
                        </a>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200">
                            <i class="fas fa-user-plus mr-2"></i>
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Character Counter Script -->
    <script>
        // First Name Counter
        const firstNameInput = document.getElementById('first_name');
        const firstNameCounter = document.getElementById('firstNameCount');
        
        if (firstNameInput && firstNameCounter) {
            firstNameInput.addEventListener('input', function() {
                const count = this.value.length;
                firstNameCounter.textContent = count;
                
                if (count > 40) {
                    firstNameCounter.parentElement.classList.remove('text-gray-500');
                    firstNameCounter.parentElement.classList.add('text-amber-600');
                } else {
                    firstNameCounter.parentElement.classList.remove('text-amber-600');
                    firstNameCounter.parentElement.classList.add('text-gray-500');
                }
            });
        }

        // Last Name Counter
        const lastNameInput = document.getElementById('last_name');
        const lastNameCounter = document.getElementById('lastNameCount');
        
        if (lastNameInput && lastNameCounter) {
            lastNameInput.addEventListener('input', function() {
                const count = this.value.length;
                lastNameCounter.textContent = count;
                
                if (count > 40) {
                    lastNameCounter.parentElement.classList.remove('text-gray-500');
                    lastNameCounter.parentElement.classList.add('text-amber-600');
                } else {
                    lastNameCounter.parentElement.classList.remove('text-amber-600');
                    lastNameCounter.parentElement.classList.add('text-gray-500');
                }
            });
        }
    </script>

@endsection
