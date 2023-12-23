{{-- <div>
    <x-guest-layout>
        <div>
            <!-- Contenido principal -->
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

</div>
</x-guest-layout>
</div> --}}



<x-guest-layout>
    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We invest in the world’s potential</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
