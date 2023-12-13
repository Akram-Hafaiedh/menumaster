<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>Menu Master</title>

</head>

<body class="bg-gray-100">

    <div id="app" class="min-h-screen flex flex-col">
        <nav class="bg-blue-500 p-6">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="{{ url('/') }}" class="text-white text-lg font-semibold">{{ config('app.name', 'Laravel')
                        }}</a>
                </div>

                <div>
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('createMenu') }}" class="text-white hover:text-gray-300">Create Menu</a>
                        </li>

                        <li>
                            <a href="{{ route('categories.index') }}"
                                class="text-white hover:text-gray-300">Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('items.index') }}" class="text-white hover:text-gray-300">Items</a>
                        </li>
                        </li>
                        <!-- Add more links as needed -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mx-auto flex-1 p-4">
            @if (session('success'))
            <div class="bg-green-200 border-green-600 border-l-4 p-4 mb-4">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')
        </div>

        <footer class="bg-blue-500 text-white text-center py-2">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </footer>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
</body>

</html>