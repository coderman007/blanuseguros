<x-guest-layout>

    <!-- Sección de presentación -->
    <div class="bg-gray-300 w-4/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
        ¿Quiénes somos?
    </div>

    <div id="default-carousel" class="relative w-4/6 mx-auto" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/salud.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Salud
                    </p>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/vida.webp') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Vida
                    </p>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/auto.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Auto
                    </p>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/pesado.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Vehículos Pesados
                    </p>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/cumplimiento.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Cumplimiento
                    </p>
                </div>
            </div>
            <!-- Item 6 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel/responsabilidad.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Mensaje superpuesto en la parte superior izquierda -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center justify-center">
                    <p class="text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
                        Seguro de Responsabilidad Civil
                    </p>
                </div>
            </div>

        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Anterior</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Siguiente</span>
            </span>
        </button>
    </div>


    <!-- Reseña de AnuskinaSeguros -->
    <div class="w-4/5 mx-auto my-10 text-lg">
        <div class="font-semibold text-4xl mb-4">Descubre más sobre AnuskinaSeguros</div>
        <p class="mb-4">
            AnuskinaSeguros es tu socio confiable en el mundo de los seguros. Nuestra misión es protegerte a ti y a
            tus activos, proporcionándote tranquilidad y seguridad financiera en cada etapa de tu viaje.
        </p>
        <p>
            Nos esforzamos por liderar el mercado de seguros en Colombia, destacándonos por nuestro servicio al
            cliente excepcional y la constante innovación en nuestros productos. Con experiencia y profesionalismo,
            somos la elección perfecta para aquellos que buscan proteger lo que más valoran.
        </p>
    </div>

    <!-- Misión y Visión -->
    <div class="w-4/5 mx-auto grid grid-cols-1 md:grid-cols-2 my-12 gap-x-8">
        <div class="mb-8">
            <div class="font-semibold text-4xl mb-4">Misión</div>
            <p class="text-lg">
                Ofrecer seguros confiables y accesibles que protejan a nuestros clientes y sus activos, brindando
                tranquilidad y seguridad financiera.
            </p>
        </div>

        <div class="mb-8">
            <div class="font-semibold text-4xl mb-4">Visión</div>
            <p class="text-lg">
                Ser la compañía líder en el mercado de seguros en Colombia, reconocida por su excelencia en servicio
                al cliente y productos innovadores.
            </p>
        </div>
    </div>

    <!-- Compromiso con el cliente -->
    <div class="w-4/5 mx-auto mt-10 mb-20 text-lg">
        Estamos comprometidos con la satisfacción de nuestros clientes, ofreciendo soluciones de seguros adaptadas a
        sus necesidades específicas. Nuestra experiencia y profesionalismo nos convierten en la mejor elección para
        proteger lo que más valoran.
    </div>

    <!-- Sección de Aliados -->
    <div>
        <div class="bg-gray-300 w-3/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
            Aliados
        </div>
        <div class="w-4/5 mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($insuranceCompanies as $company)
                <div class="bg-gray-200 p-4 rounded-lg flex flex-col items-center shadow-md shadow-gray-600">
                    <!-- Imagen del aliado -->
                    <img src="{{ asset('storage/' . $company->image) }}" alt="Imagen de {{ $company->name }}"
                        class="w-full h-36 object-cover rounded-md mb-4">
                    <div class="flex flex-col items-left mb-6">
                        <!-- Enlace al sitio web del aliado -->
                        <p><a href="{{ $company['url'] }}" target="_blank"
                                class="text-blue-500">{{ $company['url'] }}</a></p>
                        <!-- Información de contacto del aliado -->
                        <p><strong>Dirección:</strong> {{ $company['address'] }}</p>
                        <p><strong>Teléfono:</strong> {{ $company['phone'] }}</p>
                        <p><strong>Email:</strong> <a
                                href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a></p>
                    </div>
                    <!-- Botón de contacto con soporte técnico -->
                    <!-- Botón de contacto con soporte técnico -->
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center py-3 px-6 text-lg font-medium text-center bg-[#223B5A] text-white border-2 border-[#2C425F] hover:bg-[#202f44] hover:text-white hover:border-[#2C425F] focus:ring-4 focus:ring-offset-2 focus:ring-[#2C425F] focus:outline-none rounded-lg transition-all duration-300 ease-in-out">Contáctanos</a>

                </div>
            @endforeach
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</x-guest-layout>
