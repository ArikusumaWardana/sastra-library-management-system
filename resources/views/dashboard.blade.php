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
                  <p class="text-3xl font-bold text-gray-900">{{ $totalBooks }}</p>
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
                  <p class="text-3xl font-bold text-gray-900">{{ $totalBorrowers }}</p>
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
                  <p class="text-3xl font-bold text-gray-900">{{ $totalLoans }}</p>
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
                  <p class="text-3xl font-bold text-gray-900">{{ $overdue }}</p>
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
              
              <div class="flex flex-col sm:flex-row gap-3">
                  <a href="{{ route('books.create') }}" class="flex-1 inline-flex items-center justify-center bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white py-3 px-6 rounded-lg font-medium transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-lg">
                      <i class="fas fa-plus mr-2"></i>
                      Add Your First Book
                  </a>
                  <a href="{{ route('borrowers.create') }}" class="flex-1 inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 px-6 rounded-lg font-medium transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-lg">
                      <i class="fas fa-user-plus mr-2"></i>
                      Register a Borrower
                  </a>
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

@endsection