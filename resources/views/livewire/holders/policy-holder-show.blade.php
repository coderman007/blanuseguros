<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open_show', true)">
        <i class="p-1 text-green-400 rounded hover:text-white hover:bg-green-500 fa-solid fa-eye"></i>
        <div
            class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255"
                xml:space="preserve">
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open_show">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <div>
                <div class="md:px-5 pb-5">
                    <div class="md:mx-6">
                        @if ($holder->image)
                            <div class="mx-auto my-2 rounded-lg w-72">
                                <img src="{{ asset('storage/' . $holder->image) }}" alt="{{ $holder->first_name }}"
                                    class="w-40 h-40 mx-auto mb-4 rounded-full shadow-md shadow-gray-600">
                            </div>
                        @endif
                        <div class="text-lg text-start">
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Nombre:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">
                                    {{ $holder->first_name . ' ' . $holder->last_name }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Documento de Identidad:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $holder->document }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Correo Electrónico:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $holder->email }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Dirección:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $holder->address }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Teléfono:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $holder->phone }}</p>
                            </div>
                            <div>
                                @if ($holder->is_active)
                                    <h1 class="ml-2 text-sm">Estado:</h1>
                                    <p class="p-2 text-gray-100 bg-green-600 rounded-md">Activo</p>
                                @else
                                    <h1 class="ml-2 text-sm">Estado:</h1>
                                    <p class="p-2 text-gray-100 bg-red-400 rounded-md">Inactivo</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open_show', false)"
                    class="text-gray-500 bg-gray-200 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-500 hover:text-white">
                    Salir
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
