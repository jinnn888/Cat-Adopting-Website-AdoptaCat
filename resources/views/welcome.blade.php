<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div id="toast-success" class="invisible z-40 fixed right-5 flex flex-row items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal toast-content">Item moved successfully.</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" onclick="closeToast()">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @auth
    @include('home.partials.authenticated-nav')
    @else
    <nav>
        <div class="flex flex-row w-full justify-between py-3 px-5">
            <div>
                <a href="#">AdoptaCat</a>
            </div>
            <div class="space-x-6">
                <a href="/login" class="cursor-pointer p-2 bg-gray-800 text-white shadow-sm">Login</a>
                <a href="/register" class="cursor-pointer">Sign Up</a>
            </div>
        </div>
    </nav>
    @endauth
    
    <div class="container mx-auto content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    @stack('scripts')

    {{-- Toast JavaScript --}}
    <script>

        $(document).ready(function() {
                // $('#toast-success').hide();
            function showToast(message) {
                $('#toast-success').fadeIn(function () {
                    $(this).removeClass('invisible');
                });

                $('.toast-content').text(message);

                setTimeout(() => {
                 closeToast();

             }, 3000)                
            }

            function closeToast() {
                $('#toast-success').hide('slow');

            }

            @if(session()->has('success'))
                showToast("{{ session('success') }}");
            @endif


        })

        // function showToast(message) {
        //     const toast = document.getElementById('toast-success');
        //     toast.querySelector('.text-sm').textContent = message;
        //     toast.classList.remove('hidden');
        //     setTimeout(() => {
        //         closeToast();
        //     }, 3000); // Hide after 3 seconds
        // }

        // function closeToast() {
        //     document.getElementById('toast-success').classList.add('hidden');
        // }
        // @if(session()->has('success'))
        //     showToast("{{ session('success') }}");
        // @endif
    </script>

    {{-- Smooth Scroll --}}
    <script>
        $(document).ready(function(){
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 500, function(){
                        window.location.hash = hash;
                    });
                } 
            });
        });
    </script>
</body>
</html>