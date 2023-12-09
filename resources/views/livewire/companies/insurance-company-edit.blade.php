<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-blue-400 rounded hover:text-white hover:bg-blue-500 fa-solid fa-pen-to-square"></i>
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-6">
            Editar
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Actualizar Compañía de Seguros</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">

                <form wire:submit.prevent="updateCompany">
                    <!-- Nombre de la Compañía -->
                    <div class="mt-4">
                        <x-label value="Nombre de la Compañía" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="company.name" />
                        <x-input-error for="company.name" />
                    </div>

                    <!-- URL de la Compañía -->
                    <div class="mt-4">
                        <x-label value="URL de la Compañía" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="company.url" />
                        <x-input-error for="company.url" />
                    </div>

                    <!-- Dirección de la Compañía -->
                    <div class="mt-4">
                        <x-label value="Dirección de la Compañía" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="company.address" />
                        <x-input-error for="company.address" />
                    </div>

                    <!-- Teléfono de la Compañía -->
                    <div class="mt-4">
                        <x-label value="Teléfono de la Compañía" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="company.phone" />
                        <x-input-error for="company.phone" />
                    </div>

                    <!-- Correo Electrónico de la Compañía -->
                    <div class="mt-4">
                        <x-label value="Correo Electrónico de la Compañía" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="company.email" type="email" />
                        <x-input-error for="company.email" />
                    </div>

                </form>
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-25" wire:click="updateCompany" wire:loading.attr="disabled">
                    Actualizar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
