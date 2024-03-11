<x-guest-layout>
    <div class="h-screen">
        <section class="h-1/2 bg-center bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('images/home/beach4.jpg') }}')">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
                <h1 class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
                    AnuskinaSeguros</h1>
                <p class="mb-8 text-lg font-bold text-white lg:text-4xl sm:px-16 lg:px-48">Brindamos servicios
                    personalizados que se adaptan a tus necesidades. Tu seguridad es nuestra prioridad.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="{{ route('register') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-[#aa8a69] hover:bg-[#835629] hover:border-2 hover:border-gray-200 focus:ring-4">
                        <span class="text-2xl">Regístrate</span>
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <a href="{{ route('lines-list') }}"
                        class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg hover:border-2 hover:border-[#2C425F] hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                        <span class="text-2xl">Saber más</span>
                    </a>
                </div>
            </div>
        </section>



        <!-- Tarjetas de información de ramos -->
        <div class="container mx-auto mt-8 ml-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($lines as $line)
                    <div
                        class="max-w-sm bg-white border-2 border-[#ae956f] rounded-lg shadow-lg shadow-gray-500 dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('insurance-details', ['id' => $line->id]) }}">
                            <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}"
                                class="w-full h-40 object-cover rounded-t-lg">
                        </a>
                        <div class="p-5 bg-[#2C425F] hover:bg-[#1F2937]">
                            <a href="{{ route('insurance-details', ['id' => $line->id]) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-[#ae956f] dark:text-white">
                                    {{ $line->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-white dark:text-gray-400">{{ $line->description }}</p>
                            <a href="{{ route('insurance-details', ['id' => $line->id]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver más
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Nueva sección sobre seguros para vehículos pesados -->
        <section class="bg-gray-800 text-white py-20">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-extrabold mb-8">Especialistas en Seguros para Vehículos Pesados</h2>

                <!-- Puedes elegir entre una imagen, un carrusel o un video según tus necesidades -->
                <img src="{{ asset('images/home/trailer2.jpg') }}" alt="Seguros para Vehículos Pesados"
                    class="mx-auto mb-8 rounded-lg">

                <!-- Mensaje impactante -->
                <div class="text-3xl m-4 p-4 text-white text-center">
                    En AnuskinaSeguros, comprendemos la importancia de proteger tu inversión en vehículos pesados

                    <br />
                    Confía en nosotros para brindarte la mejor cobertura y tranquilidad en cada viaje.
                    <br />
                    Tu seguridad en nuestras manos.
                </div>

                <!-- Llamado a la acción -->
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-[#aa8a69] hover:bg-[#835629] hover:border-2 hover:border-gray-200 focus:ring-4">
                    <span class="text-2xl">¡Contáctanos ahora!</span>
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            </div>
        </section>
</x-guest-layout>
