<div class="my-auto">
    <!-- Botón para agregar planes -->
    <button wire:click.prevent="$set('open_create', true)" class="absolute right-10 top-4 px-4 py-2 rounded-md text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-plus text-xl"></i> Agregar
    </button>

    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nuevo Plan</h2>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update">
                <!-- Imágen -->
                <div class="relative mt-4">
                    <label class="flex flex-col items-center justify-center h-48 gap-4 p-6 mx-auto bg-white border-2 border-gray-300 border-dashed rounded-lg shadow-md cursor-pointer w-72">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#173152" viewBox="0 0 24 24" class="w-16 h-16">
                                <path d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <span class="font-normal text-[#173152] text-lg">Agrega una imágen para el plan</span>
                        </div>
                        <input type="file" class="hidden" wire:model.lazy="image" id="{{ $unique_input_identifier }}">
                        <div class="absolute top-0 h-48 w-72 border-dashed rounded-lg">
                            @if ($image)
                            <img class="object-cover w-full h-full rounded-lg" src="{{ $image->temporaryUrl() }}" class="mb-4" alt="Image">
                            @endif
                        </div>
                    </label>
                </div>
                <x-input-error for="image" />

                <!-- Dropdown para Ramo -->
                <x-label for="insuranceLineId" value="Ramo" class="text-gray-700" />
                <select class="w-full rounded-md" required wire:model="insuranceLineId">
                    <option value="" class="hidden">Selecciona un ramo</option>
                    @foreach ($lines as $line)
                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="insuranceLineId" />

                <!-- Nombre -->
                <x-label value="Nombre" class="text-gray-700" />
                <x-input class="w-full" wire:model="name" />
                <x-input-error for="name" />

                <!-- Descripción -->
                <x-label value="Descripción" class="text-gray-700" />
                <x-input class="w-full" wire:model="description" />
                <x-input-error for="description" />

                <!-- Cobertura -->
                <x-label value="Cobertura" class="text-gray-700" />
                <x-input class="w-full" required type="text" step="0.01" wire:model.defer="coverage" />
                <x-input-error for="coverage" />

                <!-- Precio -->

                <x-label value="Precio" class="text-gray-700" />
                <x-input class="w-full" required type="number" step="0.01" wire:model.defer="price" />
                <x-input-error for="price" />

                <!-- Estado -->
                <x-label value="Estado" class="text-gray-700" />
                <div class="flex items-center">
                    <input type="checkbox" wire:model="is_active" class="ml-2 mr-4 my-4">
                    <span class="{{ $is_active ? 'text-green-500' : 'text-red-500' }} text-lg">{{ $is_active ? 'Activo' : 'Inactivo' }}</span>
                </div>
                <x-input-error for="is_active" />
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open_create', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white" wire:click="add" wire:loading.attr="disabled" wire:target="add">
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
