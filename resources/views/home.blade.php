<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlanuSeguros</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

</head>

<body class="text-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white">

    <!-- Barra de navegación -->
    <nav class="py-2"
        style="background: rgb(22,48,81);
        background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
        <div class="container flex items-center justify-between mx-auto">
            <div class="flex items-center">
                <img src="{{ asset('images/logoPequeño.png') }}" alt="Logo BlanuSeguros" class="h-12 mr-2 w-14">
                <div class="text-2xl font-bold text-[#D5D9DA]">
                    <span
                        style="background: #916737;
                    background: linear-gradient(to right, #916737 0%, #DDDEC8 50%, #916737 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;">
                        BLANUSeguros</span>
                </div>
            </div>
            <div class="flex justify-between w-4/12">
                <div class="flex items-center space-x-2 ">
                    <a href="#" class="text-white">Inicio</a>
                    <div class="bg-white w-[2px] h-5"></div>
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}" class="text-white">Polizas</a>
                        <div class="bg-white w-[2px] h-5"></div>
                    @endif
                    <a href="#" class="text-white">Productos</a>
                    <div class="bg-white w-[2px] h-5"></div>
                    <a href="#" class="text-white">Contacto</a>
                </div>
                <div>
                    <a href="{{ route('login') }}"
                        class="text-white border-2 border-gray-100 hover:bg-gray-100 hover:text-[rgb(22,48,81)] py-1 px-3 rounded-md">Ingresar</a>
                </div>
            </div>

        </div>
    </nav>






    <!-- Carrusel de imágenes -->
    {{-- <div class="container mx-auto mt-8 slick-carousel">
        <div><img src="{{ asset('images/carrusel/img1.jpg') }}" alt="Img1" class="object-cover w-full h-96"></div>
        <div><img src="{{ asset('images/carrusel/img2.jpg') }}" alt="Img2" class="object-cover w-full h-96"></div>
        <div><img src="{{ asset('images/carrusel/img3.jpg') }}" alt="Img3" class="object-cover w-full h-96"></div>
    </div> --}}
    <!-- Contenido principal -->

    <!-- Video de presentación con mensaje superpuesto -->
    <!-- Contenedor principal relativo -->
    <div class="relative aspect-w-16 aspect-h-9">
        <!-- Contenedor del video -->
        <div class="w-full mx-auto h-[94vh]">
            <video class="object-cover w-full h-full" src="{{ asset('video/video.mp4') }}" autoplay muted loop></video>
        </div>
        <!-- Contenedor del mensaje superpuesto -->
        <div class="absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
            <div class="p-4 text-center text-white">
                <h2 class="text-6xl font-bold">¡Bienvenido a BlanuSeguros!</h2>
                <p class="mt-2 text-2xl">Descubre nuestras soluciones de seguros para tu tranquilidad.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <!-- Tarjetas de información de ramos -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($lines as $line)
                <div class="p-6 bg-white rounded-lg shadow-lg shadow-gray-400 dark:bg-gray-800">
                    <h2 class="mb-2 text-3xl font-semibold text-center">{{ $line['name'] }}</h2>
                    <div class="w-11/12 h-1 mx-auto mb-4 bg-blue-400 rounded-md"></div>
                    <div class="mx-auto my-2 rounded-full w-52">
                        <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}"
                            class="w-full h-auto rounded-lg">
                    </div>
                    class="object-cover w-full h-48 mb-4 rounded-md">
                    <p class="px-2 text-gray-700 dark:text-gray-300">
                        {{-- {{ $line['description'] }} --}}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil voluptates provident in sapiente
                        quis sunt nam sed cumque, sequi aliquam optio fugiat mollitia eaque quam. Suscipit tempore quod
                        odio laborum!
                    </p>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Footer -->
    <div class="flex w-full mt-8 h-80"
        style="background: rgb(22,48,81);
        background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
        <div class="flex items-center ml-8">
            <img src="{{ asset('images/logoPequeño.png') }}" alt="" class="w-full h-1/2">

        </div>
        <div>

        </div>
    </div>
    {{-- <footer class="p-4 mt-8 bg-gray-200 dark:bg-gray-700">
        <div class="container mx-auto">
            <p class="text-center text-gray-600 dark:text-gray-300">&copy; 2023 Plataforma de Seguros</p>
        </div>
    </footer> --}}

    @livewireScripts
    <!-- Script del Carrusel-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        // Inicialización del carrusel 
        $('.slick-carousel').slick({
            autoplay: true,
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    </script>

</body>

</html>


{{-- <!-- Video de presentación con mensaje superpuesto -->
    <div class="relative mt-8">
        <!-- Contenedor del video -->
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="absolute inset-0 w-full h-full" src="url_del_video" frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- Contenedor del mensaje superpuesto -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="p-4 text-center text-white bg-black bg-opacity-50">
                <h2 class="text-2xl font-bold">¡Bienvenido a BlanuSeguros!</h2>
                <p class="mt-2">Descubre nuestras soluciones de seguros para tu tranquilidad.</p>
            </div>
        </div>
    </div> --}}
