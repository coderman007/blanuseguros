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
            <h2 class="mt-3 text-2xl text-center">Actualizar Tomador de Póliza</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">

                <form wire:submit.prevent="updateHolder">
                    <!-- Documento -->
                    <div class="mt-4">
                        <x-label value="Documento" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="document" />
                        <x-input-error for="document" />
                    </div>

                    <!-- Nombre -->
                    <div class="mt-4">
                        <x-label value="Nombre" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="first_name" />
                        <x-input-error for="first_name" />
                    </div>

                    <!-- Apellido -->
                    <div class="mt-4">
                        <x-label value="Apellido" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="last_name" />
                        <x-input-error for="last_name" />
                    </div>

                    <!-- Dirección -->
                    <div class="mt-4">
                        <x-label value="Dirección" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="address" />
                        <x-input-error for="address" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <x-label value="Teléfono" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="phone" />
                        <x-input-error for="phone" />
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mt-4">
                        <x-label value="Correo Electrónico" class="text-gray-700" />
                        <x-input class="w-full" wire:model.defer="email" type="email" />
                        <x-input-error for="email" />
                    </div>

                </form>
            </x-slot>
        </div>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-25" wire:click="updateHolder" wire:loading.attr="disabled">
                    Actualizar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
