<div class="relative p-4 bg-gray-100 rounded-lg">
    <!-- Sección de Título y Búsqueda -->
    <div class="grid items-center w-full mt-2 md:grid-cols-12">
        <div class="col-span-4">
            <input type="text" name="search" wire:model="search" class="w-full bg-gray-200 border-2 border-gray-300 rounded-lg focus:ring-gray-400" placeholder="Buscar...">
        </div>
        <div class="inline pl-4 pr-16 mt-4 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
            <div class="text-xl font-bold text-center text-blue-400 uppercase">
                <h1>Ramos de Seguros</h1>
            </div>
        </div>
    </div>

    <!-- Componente para crear ramos -->
    <livewire:lines.insurance-line-create />

    <!-- Verificar si hay ramos antes de renderizar la tabla y su encabezado -->
    @if ($lines->count() > 0)

    <div class="py-4 ml-4 text-gray-500">
        Registros por página
        <input type="number" name="perPage" min=1 wire:model="perPage" class="w-[70px] pr-2 py-1 cursor-pointer bg-gray-200 border-2 border-gray-300 rounded-lg focus:ring-gray-400">
    </div>

    <div class="relative hidden md:block mt-2 md:mt-4 overflow-x-hidden shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <!-- Cabecera de la tabla -->
            <thead class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-4 cursor-pointer" wire:click.prevent="order('id')">
                        ID
                        <!-- Sorting Icons -->
                        @if ($sort == 'id')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('name')">
                        Nombre
                        <!-- Sorting Icons -->
                        @if ($sort == 'name')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('description')">
                        Descripción
                        <!-- Sorting Icons -->
                        @if ($sort == 'description')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Compañía
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('is_active')">
                        Estado
                        <!-- Sorting Icons -->
                        @if ($sort == 'is_active')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>

            <!-- Cuerpo de la tabla -->
            <tbody>
                @forelse ($lines as $line)
                <div class="hidden">
                    @if ($line->is_active)
                    {{ $colorIsActive = 'text-green-600' }}
                    {{ $textIsActive = 'Activo'}}
                    @else
                    {{ $colorIsActive = 'text-red-500' }}
                    {{ $textIsActive = 'Inactivo'}}
                    @endif
                </div>
                <tr class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $line->id }}
                    </th>
                    <td class="px-6 py-4 dark:text-lg">{{ $line->name }}</td>
                    <td class="px-6 py-4 ">{{ $line->description }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ optional($line->insuranceCompany)->name }}</td>
                    <td class="px-6 py-4 dark:text-lg {{ $colorIsActive }}">{{ $textIsActive }}</td>

                    <td class="flex justify-around py-4 pl-2 pr-8">
                        <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                            <livewire:lines.insurance-line-show :line="$line" :key="time() . $line->id" />
                            <livewire:lines.insurance-line-edit :lineId="$line->id" :key="time() . $line->id" />
                            <livewire:lines.insurance-line-delete :lineId="$line->id" :key="time() . $line->id" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-3xl text-center dark:text-gray-200">
                        No hay líneas de seguros disponibles
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="px-3 py-1">
            {{ $lines->links() }}
        </div>
    </div>
    @else
    <!-- No Results Message -->
    <h1 class="my-64 text-5xl text-center dark:text-gray-200">
        <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron líneas de seguros. </span>
    </h1>
    <!-- Return to Previous Page Button -->
    <div class="flex justify-center w-full h-auto">
        <button class="px-8 py-3 mx-auto text-2xl text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-md shadow-md hover:border-blue-500 hover:shadow-blue-400 hover:text-gray-100 hover:bg-blue-300">
            <a href="{{ route('lines') }}">Volver</a>
        </button>
    </div>
    @endif
</div>
