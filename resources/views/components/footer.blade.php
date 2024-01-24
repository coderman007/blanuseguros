<footer class="bg-white rounded-lg shadow dark:bg-gray-700">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{route('dashboard')}}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{asset('images/logo.jpeg')}}" class="h-8" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">AnuskinaSeguros</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-700 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Quienes Somos</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Política de Privacidad</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licencia</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contacto</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-500 sm:mx-auto dark:border-gray-300 lg:my-8" />
        <span class="block text-sm text-gray-700 sm:text-center dark:text-gray-300">© 2023 <a href="{{route('dashboard')}}" class="hover:underline">AnuskinaSeguros™</a>. Todos los Derechos Reservados.</span>
    </div>
</footer>
