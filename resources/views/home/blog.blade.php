<div>
    <x-guest-layout>
        <div class="relative w-full h-[50vh] bg-red-400">
            <img class="w-full object-cover h-full" src="{{ asset('images/carrusel/seguro.jpg') }}" alt="">
            <div class="flex justify-center items-center absolute top-0 w-full h-full gap-x-6">
                {{-- <div class="  bg-gray-100 w-2/5 h-[40vh] rounded-md">
                </div>
                <div class="bg-gray-100 w-2/5 h-[40vh] rounded-md">
                </div> --}}
            </div>
        </div>
        <div class="my-16 flex justify-center">
            <div class="w-2/3">
                <div class="flex justify-center my-3 ">
                    <div class="w-1/3 p-4">
                        <img class="rounded-lg" src="{{ asset('images/carrusel/salud.jpg') }}" alt="">
                    </div>
                    <div class="w-2/5 p-4">
                        <div class="text-2xl font-extrabold mb-4">Cobertura Integral para tu Salud y Tranquilidad</div>
                        <p class="text-lg">
                            La salud es lo más importante, y nuestros seguros están diseñados para brindarte la
                            cobertura integral que necesitas. Desde atención médica básica hasta tratamientos
                            especializados, estamos aquí para garantizar tu bienestar y tranquilidad.
                        </p>


                        <button
                            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-[#304765] dark:bg-[#4e6c92] hover:bg-[#192738] dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Ver
                            más</button>
                    </div>
                </div>
                <div class="flex justify-center my-3">
                    <div class="w-1/3 p-4">
                        <img class="rounded-lg" src="{{ asset('images/lines/pet_insurance.jpg') }}" alt="">
                    </div>
                    <div class="w-2/5 p-4">
                        <div class="text-3xl font-extrabold mb-4">Seguro para Mascotas</div>
                        <p class="text-lg">
                            En la familia, nuestras mascotas no son solo animales, son parte integral de nuestro hogar y
                            merecen la mejor atención y cuidado. Es por eso que ofrecemos seguros especializados
                            diseñados para brindar protección completa a nuestros amigos de cuatro patas.
                        </p>
                        <button
                            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-[#304765] dark:bg-[#4e6c92] hover:bg-[#192738] dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Ver
                            más</button>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div class="sticky top-16">
                    <div class="bg-gray-200 px-4 rounded-md py-1 text-base font-semibold w-fit">
                        Recomendaciones
                    </div>
                    <div class="flex m-4 gap-x-4 items-center w-3/4">
                        <img class="w-28 rounded-lg" src="{{ asset('images/lines/auto_insurance.jpg') }}"
                            alt="">
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
                        <img class="w-28 rounded-lg" src="{{ asset('images/lines/health_insurance.jpg') }}"
                            alt="">
                        <div>
                            Recomendación para seguros de salud individual.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
</div>
