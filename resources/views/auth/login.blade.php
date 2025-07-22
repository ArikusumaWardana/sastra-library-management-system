<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Login - Literary Collection</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -right-10 w-80 h-80 rounded-full bg-gradient-to-r from-amber-200/30 to-orange-200/30 blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-96 h-96 rounded-full bg-gradient-to-r from-yellow-200/30 to-amber-200/30 blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-md w-full space-y-8">
        <!-- Header Section -->
        <div class="text-center">
            <!-- Book Icon -->
            <div class="mx-auto h-20 w-20 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg mb-6">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>

            <h1 class="text-4xl font-bold bg-gradient-to-r from-amber-700 to-orange-700 bg-clip-text text-transparent mb-2">
                Literary Library
            </h1>
            <p class="text-lg text-amber-800 font-medium mb-2">Welcome Back</p>
            <p class="text-sm text-amber-600 italic">
                "A room without books is like a body without a soul" - Cicero
            </p>
        </div>

        <!-- Login Form -->
        <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-amber-100">
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center">
                            <svg class="h-4 w-4 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Address
                        </span>
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                        placeholder="Enter your email address"
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
                            <svg class="h-4 w-4 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </span>
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="w-full px-4 py-3 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors duration-200 bg-white/70 backdrop-blur-sm placeholder-gray-400"
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
                >
                    <span class="flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Sign in to Library
                    </span>
                </button>
            </form>

            <!-- Additional Links -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="#" class="font-medium text-amber-600 hover:text-amber-500 transition-colors duration-200">
                        Contact Administrator
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer Quote -->
        <div class="text-center">
            <p class="text-xs text-amber-700 italic">
                "Today a reader, tomorrow a leader" - Margaret Fuller
            </p>
        </div>
    </div>

    <!-- Decorative book stack -->
    <div class="fixed bottom-10 right-10 opacity-20 pointer-events-none hidden lg:block">
        <div class="relative">
            <div class="w-16 h-2 bg-amber-600 rounded-sm mb-1"></div>
            <div class="w-14 h-2 bg-orange-600 rounded-sm mb-1 ml-1"></div>
            <div class="w-12 h-2 bg-yellow-600 rounded-sm mb-1 ml-2"></div>
            <div class="w-10 h-2 bg-amber-700 rounded-sm ml-3"></div>
        </div>
    </div>
</body>
</html> 