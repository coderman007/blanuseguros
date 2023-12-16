<div class="relative p-4 bg-gray-100 rounded-lg">

    <div class="grid items-center w-full mt-2 md:grid-cols-12">
        <div class="col-span-4">
            <input type="text" name="search" wire:model="search" class="w-full bg-gray-200 border-2 border-gray-300 rounded-lg focus:ring-gray-400" placeholder="Buscar...">
        </div>
        <div class="inline pl-4 pr-16 mt-4 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
            <div class="text-xl font-bold text-center text-blue-400 uppercase">
                <h1>Planes</h1>
            </div>
        </div>
    </div>

    {{-- Componente para crear planes --}}
    <livewire:plans.insurance-plan-create />

    <!-- Verificar si hay planes antes de renderizar la tabla y su encabezado -->
    @if ($plans->count() > 0)
    <div class="py-4 ml-4 text-gray-500">
        Registros por página
        <input type="number" name="perPage" wire:model="perPage" class="w-[70px] pr-2 py-1 cursor-pointer bg-gray-200 border-2 border-gray-300 rounded-lg focus:ring-gray-400">
    </div>

    <div class="relative mt-4 overflow-x-auto shadow-md md:block sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-center text-gray-100 uppercase bg-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-4 cursor-pointer" wire:click.prevent="order('id')">
                        ID
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

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('name')">
                        Nombre
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

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('description')">
                        Descripción
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

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click.prevent="order('price')">
                        Descripción
                        @if ($sort == 'price')
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
                        Cobertura
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Ramo
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($plans as $plan)
                <div class="hidden">
                    @if ($plan->is_active)
                    {{ $colorIsActive = 'text-green-600' }}
                    {{ $textIsActive = 'Activo'}}
                    @else
                    {{ $colorIsActive = 'text-red-500' }}
                    {{ $textIsActive = 'Inactivo'}}
                    @endif
                </div>
                <tr class="text-center bg-white border-b text-md hover:bg-gray-50">
                    <td class="px-6 py-4 dark:text-lg">{{ $plan->id }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $plan->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $plan->description }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $plan->price }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $plan->coverage }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ optional($plan->insuranceLine)->name }}</td>
                    <td class="px-6 py-4 dark:text-lg {{ $colorIsActive }}">{{ $textIsActive }}</td>
                    <td class="flex justify-around py-4 pl-2 pr-8">
                        <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                            <livewire:plans.insurance-plan-show :plan="$plan" :key="time() . $plan->id" />
                            <livewire:plans.insurance-plan-edit :plan="$plan" :key="time() . $plan->id" />
                            <livewire:plans.insurance-plan-delete :planId="$plan->id" :key="time() . $plan->id" />
                        </div>
                    </td>
                </tr>
                @empty
                <!-- Mensaje de no hay planes -->
                <tr>
                    <td colspan="12" class="mt-64 text-5xl text-center dark:text-gray-200">
                        Aún no has agregado planes de seguros.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-3 py-1">
            {{ $plans->links() }}
        </div>
    </div>
    @else
    <!-- Mensaje de no hay planes -->
    <h1 class="my-64 text-5xl text-center dark:text-gray-200">
        <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron coincidencias en la búsqueda. </span>
    </h1>
    <div class="flex justify-center w-full h-auto">
        <button class="px-8 py-3 mx-auto text-2xl text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-md shadow-md hover:border-blue-500 hover:shadow-blue-400 hover:text-gray-100 hover:bg-blue-300">
            <a href="{{ route('plans') }}">Volver</a>
        </button>
    </div>
    @endif
</div>
