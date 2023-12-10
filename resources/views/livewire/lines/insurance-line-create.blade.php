<div class="my-auto">
    <x-secondary-button wire:click="$set('open_create', true)" class="float-right dark:bg-gray-800 text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-road-plus"> Nueva Línea</i>
    </x-secondary-button>

    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nueva Línea de Seguros</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">
                <form wire:submit.prevent="add">
                    <!-- Agregado el evento submit para llamar al método add -->

                    <!-- Imagen -->
                    <div class="mt-4">
                        <x-label value="Imagen" class="text-gray-700" />
                        <input type="file" wire:model="image" class="w-full">
                        <x-input-error for="image" />

                        @if($insuranceLine)
                        @if($image)
                        <img class="object-cover w-full h-32 mt-2" src="{{ $image->temporaryUrl() }}" alt="Imagen del Ramo">
                        @else
                        <img class="object-cover w-full h-32 mt-2" src="{{ asset('storage/' . $insuranceLine->image) }}" alt="Imagen del Ramo">
                        @endif
                        @endif
                    </div>

                    <x-input-error for="image" />

                    <!-- Compañía de Seguros -->
                    <x-label for="company_id" class="text-gray-700" />
                    <select id="company_id" class="w-full mb-4 rounded-md" wire:model.lazy="insuranceCompanyId">
                        <option disabled>Selecciona una compañía</option>
                        @foreach($insuranceCompanies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="insuranceCompanyId" />

                    <!-- Nombre de la Línea -->
                    <x-label for="name" class="text-gray-700" />
                    <x-input id="name" class="w-full" wire:model.lazy="name" />
                    <x-input-error for="name" />

                    <!-- Descripción -->
                    <x-label for="description" class="text-gray-700" />
                    <textarea id="description" class="w-full mb-4 rounded-md" rows="4" wire:model.lazy="description"></textarea>
                    <x-input-error for="description" />

                    <!-- Estado -->
                    <x-label for="is_active" class="text-gray-700" />
                    <select id="is_active" class="w-full mb-4 rounded-md" wire:model.lazy="is_active">
                        <option disabled>Selecciona un estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                    <x-input-error for="is_active" />
                </form>
            </x-slot>

            <x-slot name="footer">
                <div class="mx-auto">
                    <x-secondary-button wire:click="$set('open_create', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:bg-gray-400 hover:shadow-gray-400">
                        Cancelar
                    </x-secondary-button>
                    <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:bg-blue-400 hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white" wire:click="add" wire:loading.attr="disabled" wire:target="add">
                        Agregar
                    </x-secondary-button>
                </div>
            </x-slot>
        </div>
    </x-dialog-modal>
</div>
