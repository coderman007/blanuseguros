<div class="flex flex-col">
    <div class="mb-4">
        <div>
            <!-- Video de presentación -->
            <div class="relative aspect-w-16 aspect-h-9">
                <!-- Contenedor del video -->
                <div class="w-full mx-auto h-[94vh]">
                    <video class="object-cover w-full h-full" src="{{ asset('video/video.mp4') }}" autoplay muted loop></video>
                </div>
                <!-- Contenedor del mensaje superpuesto -->
                <div class="absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                    <div class="p-4 text-center text-gray-300">
                        <h2 class="text-6xl font-bold">¡Bienvenido a BlanuSeguros!</h2>
                        <p class="mt-2 text-4xl">"Tu seguridad, nuestro compromiso."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
