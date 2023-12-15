<div>
    <x-guest-layout>
        <div>
            <!-- Contenido principal -->
            <!-- Video de presentación -->
            <div class="relative aspect-w-16 aspect-h-9">
                <!-- Contenedor del video -->
                <div class="w-full mx-auto h-[94vh]">
                    <video class="object-cover w-full h-full" src="{{ asset('video/video.mp4') }}" autoplay muted loop></video>
                </div>
                <!-- Redes sociales -->
                <div class="text-3xl text-black dark:text-white social-icons absolute top-1/3 right-4 flex flex-col items-end m-4">
                    <a href="#"><i class="fa-brands fa-whatsapp mb-2"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook mb-2"></i></a>
                    <a href="#"><i class="fa-brands fa-telegram mb-2"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube mb-2"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram mb-2"></i></a>
                </div>

                <!-- Contenedor del mensaje superpuesto -->
                <div class="absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                    <div class="p-4 text-center text-gray-300">
                        <h2 class="text-6xl font-bold">¡Bienvenido a BlanuSeguros!</h2>
                        <p class="mt-2 text-4xl">"Tu seguridad, nuestro compromiso."</p>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de información de ramos -->
            <div class="container mx-auto mt-8">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($lines as $line)
                    <div class="p-6 bg-white rounded-lg shadow-lg shadow-gray-400 dark:bg-gray-800">
                        <h2 class="mb-2 text-3xl dark:text-white font-semibold text-center">{{ $line['name'] }}</h2>
                        <div class="w-11/12 h-1 mx-auto mb-4 bg-blue-400 rounded-md"></div>
                        <div class="mx-auto my-2 rounded-full w-52">
                            <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}" class="w-full h-auto rounded-lg">
                        </div>
                        <p class="px-2 text-gray-700 dark:text-gray-300">
                            {{ $line->description }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Footer -->
            <div class="w-full mt-8 h-80" style="background: rgb(22,48,81);
                background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
                <div class="grid grid-cols-5 w-full h-full text-center text-gray-100">
                    <div class="col-span-1 p-3 mt-8">
                        Redes sociales
                        <hr class="w-1/2 mx-auto">
                        <hr class="w-1/2 mx-auto">
                        <div class="w-1/2 mx-auto text-left pl-10 pt-2">
                            <div>Facebook</div>
                            <div>Instagram</div>
                            <div>Whatsapp</div>
                        </div>
                    </div>
                    <div class="col-span-1 p-3 mt-8">
                        servicios
                        <hr class="w-1/2 mx-auto">
                        <hr class="w-1/2 mx-auto">
                        <div class="w-1/2 mx-auto text-left pl-2 top-2">
                            <div>Seguros familiares</div>
                            <div>Seguros personales</div>
                            <div>Seguros vehiculos</div>
                            <div>Seguros ancianos</div>
                            <div>Seguros de vida</div>
                        </div>
                    </div>
                    <div class="col-span-1 p-3 mt-8">
                        Secciones
                        <hr class="w-1/2 mx-auto">
                        <hr class="w-1/2 mx-auto">
                        <div class="w-1/2 mx-auto text-left pl-2 top-2">
                            <div>Seccion uno</div>
                            <div>Seccion dos</div>
                            <div>Seccion tres</div>
                            <div>Seccion cuatro</div>
                            <div>Seccion cinco</div>
                        </div>
                    </div>
                    <div class="col-span-2 bg-green-500 p-3">
                        hola
                        <hr class="w-1/2 mx-auto">
                        <hr class="w-1/2 mx-auto">
                    </div>
                </div>
                <div class="w-full bg-gray-700">
                    copy
                </div>
            </div>

        </div>
    </x-guest-layout>
</div>
