<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard - Literary Collection</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50">
    
    <!-- Background decorative elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-10 -right-10 w-80 h-80 rounded-full bg-gradient-to-r from-amber-200/20 to-orange-200/20 blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-96 h-96 rounded-full bg-gradient-to-r from-yellow-200/20 to-amber-200/20 blur-3xl"></div>
    </div>

    <!-- Layout Container -->
    <div class="relative z-10">
        
        <!-- Fixed Sidebar -->
        @include('main.parts.sidebar')

        <!-- Main Content Area with Sidebar Offset -->
        <div class="ml-64">
            
            <!-- Sticky Header -->
            @include('main.parts.header')

            <!-- Main Dashboard Content -->
            <main class="p-6">
              
                <!-- Content -->
                @yield('content')

            </main>
        </div>
    </div>

    <!-- JavaScript for dropdown -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = event.target.closest('button');
            
            if (!button || !button.onclick) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html> 