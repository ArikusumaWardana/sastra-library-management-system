<!-- Sticky Top Navbar -->
<header class="sticky top-0 bg-white/90 backdrop-blur-sm shadow-lg border-b border-amber-100 px-6 py-4 z-20">
    <div class="flex items-center justify-between">
        <!-- Page Title -->
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                @yield('page-title', 'Dashboard')
            </h1>
            <p class="text-sm text-gray-600 mt-1">
                @yield('page-subtitle', 'Welcome back to your literary collection management')
            </p>
        </div>

        <!-- User Info & Dropdown -->
        <div class="relative">
            <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <div class="h-10 w-10 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-white font-semibold text-sm">
                        {{ substr(Auth::user()->first_name ?? 'U', 0, 1) }}{{ substr(Auth::user()->last_name ?? 'ser', 0, 1) }}
                    </span>
                </div>
                
                <!-- User Info -->
                <div class="hidden md:block">
                    <p class="text-sm font-semibold text-gray-700">
                        {{ Auth::user()->first_name ?? 'User' }} {{ Auth::user()->last_name ?? '' }}
                    </p>
                    <p class="text-xs text-amber-600 capitalize">{{ Auth::user()->role ?? 'Staff' }}</p>
                </div>

                <!-- Dropdown Button -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center text-gray-600 hover:text-amber-700 transition-colors duration-200">
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-amber-100 z-50">
                        <div class="py-2">
                            <a href="#" class="flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-colors duration-200">
                                <i class="fas fa-user w-4 text-center"></i>
                                <span class="text-sm">Profile Settings</span>
                            </a>
                            <a href="#" class="flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-colors duration-200">
                                <i class="fas fa-cog w-4 text-center"></i>
                                <span class="text-sm">System Settings</span>
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center space-x-2 w-full px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt w-4 text-center"></i>
                                    <span class="text-sm">Sign Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>