<!-- Fixed Sidebar -->
<div class="fixed top-0 left-0 w-64 h-screen bg-white/90 backdrop-blur-sm shadow-xl border-r border-amber-100 flex flex-col z-30">
    <!-- Logo/Brand -->
    <div class="p-6 border-b border-amber-100 flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-10 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-book-open text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-lg font-bold bg-gradient-to-r from-amber-700 to-orange-700 bg-clip-text text-transparent">
                    Literary Library
                </h1>
                <p class="text-xs text-amber-600 italic">Dashboard</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu - Scrollable -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <div class="mb-4">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Main Menu</h3>
        </div>
        
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
            <i class="fas fa-tachometer-alt text-lg w-5 text-center"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Books Management -->
        <div class="space-y-1">
            <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Books Management</h4>
            <a href="{{ route('books') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs(['books*', 'books.create', 'books.edit']) ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
                <i class="fas fa-books text-lg w-5 text-center"></i>
                <span>All Books</span>
            </a>
            <a href="{{ route('categories') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs(['categories*', 'categories.create', 'categories.edit']) ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
                <i class="fas fa-tags text-lg w-5 text-center"></i>
                <span>All Categories</span>
            </a>
        </div>

        <!-- Borrowers Management -->
        <div class="space-y-1">
            <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Borrowers Management</h4>
            <a href="{{ route('borrowers') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs(['borrowers*', 'borrowers.create', 'borrowers.edit']) ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
                <i class="fas fa-users text-lg w-5 text-center"></i>
                <span>All Borrowers</span>
            </a>
        </div>

        <!-- Loans Management -->
        <div class="space-y-1">
            <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Loans Management</h4>
            <a href="{{ route('loans') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs(['loans*', 'loans.create', 'loans.edit']) ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
                <i class="fas fa-book-reader text-lg w-5 text-center"></i>
                <span>All Loans</span>
            </a>    
        </div>

        <!-- Visible only to admin -->
        @if(Auth::user()->role === 'superadmin')
            <!-- Users Management -->
            <div class="space-y-1">
                <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Users Management</h4>
                <a href="{{ route('users') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs(['users*', 'users.create', 'users.edit']) ? 'text-amber-700 bg-amber-100 border border-amber-200' : 'text-gray-600 hover:text-amber-700 hover:bg-amber-50' }}">
                    <i class="fas fa-users text-lg w-5 text-center"></i>
                    <span>All Users</span>
                </a>    
            </div>
        @endif
    </nav>

    <!-- Quote at bottom of sidebar - Fixed -->
    <div class="p-4 border-t border-amber-100 flex-shrink-0">
        <div class="text-center">
            <p class="text-xs text-amber-600 italic leading-relaxed">
                "So many books, so little time"
            </p>
            <p class="text-xs text-amber-500 mt-1">- Frank Zappa</p>
        </div>
    </div>
</div>