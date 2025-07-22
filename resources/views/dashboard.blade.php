@extends('main.main')

@section('content')
    
  <!-- Stats Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <!-- Total Books -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100 hover:shadow-xl transition-shadow duration-300">
          <div class="flex items-center">
              <div class="p-3 bg-blue-100 rounded-full">
                  <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                  </svg>
              </div>
              <div class="ml-4">
                  <h3 class="text-lg font-semibold text-gray-700">Total Books</h3>
                  <p class="text-3xl font-bold text-gray-900">0</p>
                  <p class="text-sm text-gray-500 mt-1">In collection</p>
              </div>
          </div>
      </div>

      <!-- Active Borrowers -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100 hover:shadow-xl transition-shadow duration-300">
          <div class="flex items-center">
              <div class="p-3 bg-green-100 rounded-full">
                  <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  </svg>
              </div>
              <div class="ml-4">
                  <h3 class="text-lg font-semibold text-gray-700">Active Borrowers</h3>
                  <p class="text-3xl font-bold text-gray-900">0</p>
                  <p class="text-sm text-gray-500 mt-1">Registered members</p>
              </div>
          </div>
      </div>

      <!-- Books on Loan -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100 hover:shadow-xl transition-shadow duration-300">
          <div class="flex items-center">
              <div class="p-3 bg-yellow-100 rounded-full">
                  <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
              </div>
              <div class="ml-4">
                  <h3 class="text-lg font-semibold text-gray-700">Books on Loan</h3>
                  <p class="text-3xl font-bold text-gray-900">0</p>
                  <p class="text-sm text-gray-500 mt-1">Currently borrowed</p>
              </div>
          </div>
      </div>

      <!-- Overdue Books -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100 hover:shadow-xl transition-shadow duration-300">
          <div class="flex items-center">
              <div class="p-3 bg-red-100 rounded-full">
                  <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L4.348 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                  </svg>
              </div>
              <div class="ml-4">
                  <h3 class="text-lg font-semibold text-gray-700">Overdue Books</h3>
                  <p class="text-3xl font-bold text-gray-900">0</p>
                  <p class="text-sm text-gray-500 mt-1">Need attention</p>
              </div>
          </div>
      </div>
  </div>

  <!-- Empty State Content -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
      <!-- Welcome Message -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-8 border border-amber-100">
          <div class="text-center">
              <div class="mx-auto h-16 w-16 bg-gradient-to-br from-amber-600 to-orange-600 rounded-full flex items-center justify-center shadow-lg mb-4">
                  <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-900 mb-2">Welcome to Literary Library</h3>
              <p class="text-gray-600 mb-6">Your digital library management system is ready. Start by adding your first book or registering borrowers.</p>
              
              <div class="space-y-3">
                  <button class="w-full bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white py-3 px-4 rounded-lg font-medium transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-lg">
                      Add Your First Book
                  </button>
                  <button class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 px-4 rounded-lg font-medium transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-lg">
                      Register a Borrower
                  </button>
              </div>
          </div>
      </div>

      <!-- Quick Stats -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-8 border border-amber-100">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Library Status</h3>
          <div class="space-y-4">
              <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-600">System Status</span>
                  <span class="flex items-center text-green-600 font-medium">
                      <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                      Online
                  </span>
              </div>
              <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-600">Database</span>
                  <span class="flex items-center text-green-600 font-medium">
                      <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                      Connected
                  </span>
              </div>
              <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-gray-600">Last Activity</span>
                  <span class="text-gray-500">Just now</span>
              </div>
          </div>
          
          <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200">
              <p class="text-sm text-amber-800 italic leading-relaxed">
                  "A library is not a luxury but one of the necessities of life."
              </p>
              <p class="text-xs text-amber-600 mt-2 font-medium">- Henry Ward Beecher</p>
          </div>
      </div>
  </div>

  <!-- Additional Content for Scroll Testing -->
  <div class="space-y-8">
      <!-- Recent Activity Section -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Activity</h3>
          <div class="space-y-4">
              <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg">
                  <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                  <div class="flex-1">
                      <p class="text-sm font-medium text-gray-900">System initialized successfully</p>
                      <p class="text-xs text-gray-500">All components are ready for use</p>
                  </div>
                  <span class="text-xs text-gray-400">Just now</span>
              </div>
              <div class="flex items-center space-x-4 p-4 bg-blue-50 rounded-lg">
                  <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                  <div class="flex-1">
                      <p class="text-sm font-medium text-gray-900">Database connection established</p>
                      <p class="text-xs text-gray-500">Ready to handle library operations</p>
                  </div>
                  <span class="text-xs text-gray-400">2 minutes ago</span>
              </div>
              <div class="flex items-center space-x-4 p-4 bg-yellow-50 rounded-lg">
                  <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                  <div class="flex-1">
                      <p class="text-sm font-medium text-gray-900">User authentication configured</p>
                      <p class="text-xs text-gray-500">Login system is operational</p>
                  </div>
                  <span class="text-xs text-gray-400">5 minutes ago</span>
              </div>
          </div>
      </div>

      <!-- Quick Actions Grid -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <button class="flex flex-col items-center p-6 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-blue-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">Add Book</span>
              </button>
              
              <button class="flex flex-col items-center p-6 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-green-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">Add Borrower</span>
              </button>
              
              <button class="flex flex-col items-center p-6 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-amber-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">Process Loan</span>
              </button>
              
              <button class="flex flex-col items-center p-6 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-purple-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">Manage Categories</span>
              </button>
              
              <button class="flex flex-col items-center p-6 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-red-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L4.348 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">View Overdue</span>
              </button>
              
              <button class="flex flex-col items-center p-6 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors duration-200 group">
                  <svg class="h-8 w-8 text-indigo-600 mb-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                  </svg>
                  <span class="text-sm font-medium text-gray-700">Generate Reports</span>
              </button>
          </div>
      </div>

      <!-- System Information -->
      <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 border border-amber-100 mb-8">
          <h3 class="text-xl font-bold text-gray-900 mb-6">System Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-4">
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">Laravel Version</span>
                      <span class="font-medium">9.19</span>
                  </div>
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">PHP Version</span>
                      <span class="font-medium">8.0+</span>
                  </div>
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">Database</span>
                      <span class="font-medium">MySQL</span>
                  </div>
                  <div class="flex justify-between py-2">
                      <span class="text-gray-600">Environment</span>
                      <span class="font-medium text-green-600">Development</span>
                  </div>
              </div>
              <div class="space-y-4">
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">Tailwind CSS</span>
                      <span class="font-medium">v4.1.11</span>
                  </div>
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">Vite</span>
                      <span class="font-medium">v4.0.0</span>
                  </div>
                  <div class="flex justify-between py-2 border-b border-gray-200">
                      <span class="text-gray-600">Node.js</span>
                      <span class="font-medium">Latest</span>
                  </div>
                  <div class="flex justify-between py-2">
                      <span class="text-gray-600">Theme</span>
                      <span class="font-medium text-amber-600">Literary Library</span>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection