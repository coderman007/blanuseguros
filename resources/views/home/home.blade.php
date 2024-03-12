<x-guest-layout>
    <style>
        #title {
            text-align: center;
            animation: changeColor 10s infinite alternate, stopAnimation 5s 1 forwards;
            color: #1A3454;
            /* Azul oscuro como color base */
        }

        @keyframes changeColor {
            0% {
                color: #987244;
                /* Dorado */
            }

            25% {
                color: #1A3454;
                /* Azul oscuro */
            }

            50% {
                color: #987244;
                /* Dorado */
            }

            75% {
                color: #1A3454;
                /* Azul oscuro */
            }

            100% {
                color: #987244;
                /* Dorado */
            }
        }

        @keyframes stopAnimation {
            to {
                animation-play-state: paused;
            }
        }
    </style>
    <div>
        <section class="h-1/2 bg-center bg-no-repeat bg-cover mb-10"
            style="background-image: url('{{ asset('images/home/beach4.jpg') }}')">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
                <h1 id="title"
                    class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
                    AnuskinaSeguros</h1>
                <p class="mb-8 text-lg font-bold text-white lg:text-4xl sm:px-16 lg:px-48">Tu seguridad es nuestra
                    prioridad.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center py-3 px-6 text-lg font-medium text-center text-[#223B5A] bg-white border-2 border-[#2C425F] hover:text-white hover:bg-[#2C425F] hover:border-[#2C425F] focus:ring-4 focus:ring-offset-2 focus:ring-[#2C425F] focus:outline-none rounded-lg transition-all duration-300 ease-in-out">
                        <span class="text-2xl">Regístrate</span>
                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <a href="{{ route('lines-list') }}"
                        class="inline-flex items-center justify-center py-3 px-6 text-lg font-medium text-center text-[#223B5A] bg-white border-2 border-[#2C425F] hover:text-white hover:bg-[#2C425F] hover:border-[#2C425F] focus:ring-4 focus:ring-offset-2 focus:ring-[#2C425F] focus:outline-none rounded-lg transition-all duration-300 ease-in-out">
                        <span class="text-2xl">Saber más</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Tarjetas de información de ramos -->
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($lines as $line)
                    <div
                        class="max-w-sm bg-white border-2 border-[#ae956f] rounded-lg shadow-md shadow-gray-600 dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('insurance-details', ['id' => $line->id]) }}">
                            <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}"
                                class="w-full h-40 object-cover rounded-t-lg">
                        </a>
                        <div class="p-5 bg-[#2C425F] hover:bg-[#1A3454]">
                            <a href="{{ route('insurance-details', ['id' => $line->id]) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-[#ae956f] dark:text-white">
                                    {{ $line->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-white dark:text-gray-400">{{ $line->description }}</p>
                            <a href="{{ route('insurance-details', ['id' => $line->id]) }}"
                                class="inline-flex items-center justify-center py-3 px-6 text-sm font-medium text-center bg-[#223B5A] text-white border-2 border-white hover:bg-white hover:text-[#223B5A] hover:border-2 hover:border-[#AE9566] focus:ring-4 focus:ring-offset-2 focus:ring-[#2C425F] focus:outline-none rounded-lg transition-all duration-300 ease-in-out">
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
        <section class="text-gray-800 py-20 relative">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-extrabold mb-8">Especialistas en Seguros para Vehículos Pesados</h2>

                <!-- Contenedor con estilo para la imagen de portada -->
                <div class="relative overflow-hidden rounded-lg mb-8">
                    <img src="{{ asset('images/home/trailer3.jpg') }}" alt="Seguros para Vehículos Pesados"
                        class="w-full h-96 object-cover rounded-lg">

                    <!-- Superposición de texto en la parte superior izquierda -->
                    <div class="absolute top-0 left-0 p-8 text-white text-3xl font-extrabold">
                        ¡Protege tu inversión con AnuskinaSeguros!
                    </div>
                </div>

                <!-- Mensaje impactante -->
                <div class="text-2xl m-4 p-4 text-gray-700 text-left font-extrabold mb-8">

                    En AnuskinaSeguros, tu tranquilidad es nuestra prioridad. Nos comprometemos a protegerte con
                    soluciones confiables y personalizadas. ¡Descansa tranquilo, estamos aquí para cuidar de ti y lo
                    que
                    más valoras!
                </div>

                <!-- Llamado a la acción -->
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center py-3 px-6 text-lg font-medium text-center bg-[#223B5A] text-white border-2 border-[#2C425F] hover:bg-[#202f44] hover:text-white hover:border-[#2C425F] focus:ring-4 focus:ring-offset-2 focus:ring-[#2C425F] focus:outline-none rounded-lg transition-all duration-300 ease-in-out">
                    <span class="text-2xl">¡Contáctanos ahora!</span>
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            </div>
        </section>
    </div>
</x-guest-layout>
