<div>
    @if ($companies->count() > 0)
    <div>
        <div class="grid items-center w-full md:grid-cols-12 mt-2">
            <div class="col-span-4">
                <input type="text" name="search" wire:model.defer="search" class="w-full bg-white dark:text-gray-100 dark:bg-gray-800 border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
            </div>
            <div class="inline mt-4 pl-4 pr-24 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
                <div class="text-xl font-bold text-center text-blue-400 uppercase">
                    <h1 class="text-red-800 dark:text-red-700">Com<span class="text-gray-800 dark:text-gray-400">pañías</span></h1>
                </div>
            </div>
            <div class="inline mt-4 md:mt-0 md:block md:col-span-4">
                <livewire:companies.insurance-company-create />
            </div>
        </div>
        <div class="py-2 md:py-4 ml-4 text-gray-500 dark:text-gray-100">
            Registros por página
            <input type="number" name="perPage" wire:model="perPage" class="w-[70px] dark:bg-gray-800 pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
        </div>
        <div class="relative hidden md:block mt-2 md:mt-4 overflow-x-hidden shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
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
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('name')">
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
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('email')">
                            Correo
                            @if ($sort == 'email')
                            @if ($direction == 'asc')
                            <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                            @else
                            <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                            @endif
                            @else
                            <i class="ml-2 fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('phone')">
                            Teléfono
                            @if ($sort == 'phone')
                            @if ($direction == 'asc')
                            <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                            @else
                            <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                            @endif
                            @else
                            <i class="ml-2 fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('address')">
                            Dirección
                            @if ($sort == 'address')
                            @if ($direction == 'asc')
                            <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                            @else
                            <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                            @endif
                            @else
                            <i class="ml-2 fa-solid fa-sort"></i>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('url')">
                            URL
                            @if ($sort == 'url')
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
                <tbody>
                    @forelse ($companies as $company)
                    <tr class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $company->id }}
                        </th>
                        <td class="px-6 py-4 dark:text-lg">{{ $company->name }}</td>
                        <td class="px-6 py-4 ">{{ $company->email }}</td>
                        <td class="px-6 py-4 ">{{ $company->phone }}</td>
                        <td class="px-6 py-4 ">{{ $company->address }}</td>
                        <td class="px-6 py-4 ">{{ $company->url }}</td>
                        <td class="flex justify-around py-4 pl-2 pr-8">
                            <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                                <livewire:companies.insurance-company-show :company="$company" :key="time() . $company->id" />
                                <livewire:companies.insurance-company-edit :company="$company" :key="time() . $company->id" />
                                <div class="relative inline-block text-center cursor-pointer group">
                                    <a href="#" wire:click="confirmDelete({{ $company->id }})">
                                        <i class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                            Eliminar
                                            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"></svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-3xl text-center dark:text-gray-200">
                            No hay compañías disponibles
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-3 py-1">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
    @else
    <h1 class="my-64 text-5xl text-center dark:text-gray-200">
        <div>¡Ups!</div><br> <span class="mt-4"> No se encontraron coincidencias en la búsqueda. </span>
    </h1>
    <div class="flex justify-center w-full h-auto">
        <button class="px-8 py-3 mx-auto text-2xl text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-md shadow-md hover:border-blue-500 hover:shadow-blue-400 hover:text-gray-100 hover:bg-blue-300">
            <a href="{{ route('companies') }}">Volver</a>
        </button>
    </div>
    @endif
</div>
