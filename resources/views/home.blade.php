<div>
    <x-guest-layout>
        <div class="m-4">
            <x-home-menu />

            <!-- Contenido principal -->

            <!-- Video de presentación -->
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
                            <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}" class="w-full h-auto rounded-lg">
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
            <div class="flex w-full mt-8 h-80" style="background: rgb(22,48,81);
        background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
                <div class="flex items-center ml-8">
                    <img src="{{ asset('images/logoPequeño.png') }}" alt="" class="w-full h-1/2">

                </div>
                <div>

                </div>
            </div>

        </div>
    </x-guest-layout>
</div>
