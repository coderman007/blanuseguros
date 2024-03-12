<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AnuskinaSeguros</title>
    <link rel="icon" href="{{ asset('images/carrusel/img2.jpg') }}" type="image/x-icon">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css ">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #contentEval {
            overflow-y: scroll;
            scroll-margin: 20px;
        }

        #contentEval::-webkit-scrollbar {
            background: none;
            width: 10px;
            right: 10px;
        }

        #contentEval::-webkit-scrollbar-thumb {
            background: #50A44E;
            border-radius: 10px;
        }

        #contentEval::-webkit-scrollbar-track-piece {
            margin: 20px 0;
        }

        .navbar {
            background-color: #EEEFF1;
            transition: background-color 0.4s;
        }

        .navbar a:hover {
            top: 0;
            color: white;
            background-color: #0000005e;
            transition: background-color 0.4s;
        }

        .navbar.scrolled {
            background-color: #00000064;
            color: white;
        }
    </style>
</head>

<body>
    <x-home-menu />
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>
    <x-footer />
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
