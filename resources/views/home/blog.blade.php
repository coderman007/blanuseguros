<x-guest-layout>
    <div class="relative h-[50vh] bg-red-400">
        <img class="w-full object-cover h-full" src="{{ asset('images/carrusel/seguro.jpg') }}" alt="">

        <div class="absolute top-0 w-full h-full flex justify-center items-center gap-x-6">
            {{-- Contenido adicional --}}
        </div>
    </div>

    <div class="my-16 flex justify-center">
        <div class="w-2/3">
            <div class="flex justify-center my-3 space-x-6">
                <div class="w-1/3 p-4">
                    <img class="rounded-lg" src="{{ asset('images/carrusel/salud.jpg') }}" alt="">
                </div>

                <div class="w-2/3 p-4">
                    <div class="text-2xl font-extrabold mb-4">Cobertura Integral para tu Salud y Tranquilidad</div>
                    <p class="text-lg">
                        La salud es lo más importante, y nuestros seguros están diseñados para brindarte la
                        cobertura integral que necesitas. Desde atención médica básica hasta tratamientos
                        especializados, estamos aquí para garantizar tu bienestar y tranquilidad.
                    </p>

                    <button class="btn-primary">Ver más</button>

                    {{-- Botón y formulario para crear nuevas entradas (visible solo para usuarios autenticados) --}}
                    @auth
                        <button class="btn-primary">Crear Nueva Entrada</button>
                        <!-- Formulario para la nueva entrada -->
                        <!-- ... -->
                    @endauth

                    {{-- Formulario para comentarios (visible solo para usuarios autenticados) --}}
                    @auth
                        <form action="#" method="POST">
                            @csrf
                            <textarea name="content" rows="3" placeholder="Escribe tu comentario"></textarea>
                            <button type="submit" class="btn-primary">Comentar</button>
                        </form>
                    @endauth

                    {{-- Mensaje para usuarios no autenticados --}}
                    @guest
                        <p>Para comentar o crear nuevas entradas, por favor inicia sesión.</p>
                        <a href="{{ route('login') }}" class="text-[#304765] dark:text-[#4e6c92]">Iniciar sesión</a>
                    @endguest
                </div>
            </div>

            <div class="flex justify-center my-3 space-x-6">
                <div class="w-1/3 p-4">
                    <img class="rounded-lg" src="{{ asset('images/lines/pet_insurance.jpg') }}" alt="">
                </div>

                <div class="w-2/3 p-4">
                    <div class="text-3xl font-extrabold mb-4">Seguro para Mascotas</div>
                    <p class="text-lg">
                        En la familia, nuestras mascotas no son solo animales, son parte integral de nuestro hogar y
                        merecen la mejor atención y cuidado. Es por eso que ofrecemos seguros especializados
                        diseñados para brindar protección completa a nuestros amigos de cuatro patas.
                    </p>
                    <button class="btn-primary">Ver más</button>
                </div>
            </div>
        </div>

        <div class="w-1/3">
            <div class="sticky top-16">
                <div class="bg-gray-200 px-4 rounded-md py-1 text-base font-semibold w-fit">
                    Recomendaciones
                </div>

                <div class="flex m-4 gap-x-4 items-center w-3/4">
                    <img class="w-28 rounded-lg" src="{{ asset('images/lines/auto_insurance.jpg') }}" alt="">
                    <div>
                        Recomendación para seguros de auto.
                    </div>
                </div>

                <div class="flex m-4 gap-x-4 items-center w-3/4">
                    <img class="w-28 rounded-lg" src="{{ asset('images/lines/business_health_insurance.jpg') }}"
                        alt="">
                    <div>
                        Recomendación para seguros de salud empresarial.
                    </div>
                </div>

                <div class="flex m-4 gap-x-4 items-center w-3/4">
                    <img class="w-28 rounded-lg" src="{{ asset('images/lines/health_insurance.jpg') }}" alt="">
                    <div>
                        Recomendación para seguros de salud individual.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
