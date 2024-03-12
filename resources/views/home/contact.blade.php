<x-guest-layout>

    <div class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

        <!-- Contenido principal -->
        <div class="container mx-auto my-8">

            <!-- Título -->
            <h2 class="text-3xl font-semibold mb-4">¡Contáctanos!</h2>

            <!-- Información de contacto -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md shadow-[#304765]">
                    <h3 class="text-xl font-semibold mb-2">Información de contacto</h3>
                    <p><strong>Teléfono:</strong> 123-456-7890</p>
                    <p><strong>Correo electrónico:</strong> info@aseguradoraxyz.com</p>
                    <p><strong>Dirección:</strong> Calle Principal #123, Ciudad</p>
                </div>
                <!-- Formulario de contacto -->
                <form class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md shadow-[#304765]">
                    <h3 class="text-xl font-semibold mb-2">Envíanos un mensaje</h3>
                    <div class="mb-4">
                        <label for="nombre"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" id="nombre" name="nombre"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo
                            electrónico</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="mensaje"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="4"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-[#304765] dark:bg-[#4e6c92] hover:bg-[#192738] dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
