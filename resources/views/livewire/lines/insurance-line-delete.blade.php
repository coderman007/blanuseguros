<div>
    <div class="relative inline-block text-center cursor-pointer group">
        <a href="#" wire:click="$set('open', true)">
            <i class="p-1 text-red-500 rounded hover:text-white hover:bg-red-600 fa-solid fa-trash"></i>
            <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                Eliminar
                <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                </svg>
            </div>
        </a>
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Confirmar Eliminación</h2>
        </x-slot>

        <x-slot name="content">
            <p class="text-center">¿Estás seguro de que deseas eliminar esta línea de seguro?</p>
        </x-slot>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Cancelar
                </x-secondary-button>
                <x-danger-button wire:click="deleteConfirmed">
                    Eliminar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
