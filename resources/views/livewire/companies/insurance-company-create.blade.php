<div class="my-auto">
    <x-secondary-button wire:click="$set('open_create', true)" class="float-right dark:bg-gray-800 text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-building-plus"> Nueva Compañía</i>
    </x-secondary-button>

    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Nueva Compañía de Seguros</h2>
        </x-slot>

        <div class="w-1">
            <x-slot name="content">

                <form>
                    <!-- Nombre de la Compañía -->
                    <x-label value="Nombre de la Compañía" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="name" />
                    <x-input-error for="name" />

                    <!-- Correo Electrónico -->
                    <x-label value="Correo Electrónico" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="email" type="email" />
                    <x-input-error for="email" />

                    <!-- Teléfono -->
                    <x-label value="Teléfono" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="phone" />
                    <x-input-error for="phone" />

                    <!-- Dirección -->
                    <x-label value="Dirección" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="address" />
                    <x-input-error for="address" />

                    <!-- URL del Sitio Web -->
                    <x-label value="URL del Sitio Web" class="text-gray-700" />
                    <x-input class="w-full" wire:model.lazy="url" />
                    <x-input-error for="url" />
                </form>

            </x-slot>

            <x-slot name="footer">
                <div class="mx-auto">
                    <x-secondary-button wire:click="$set('open_create', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:bg-gray-400 hover:shadow-gray-400">
                        Cancelar
                    </x-secondary-button>
                    <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:bg-blue-400 hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white" wire:click="create_company" wire:loading.attr="disabled" wire:target="create_company">
                        Agregar
                    </x-secondary-button>
                </div>
            </x-slot>
        </div>
    </x-dialog-modal>
</div>
