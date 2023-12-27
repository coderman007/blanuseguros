<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open_show', true)">
        <i class="p-1 text-green-400 rounded hover:text-white hover:bg-green-500 fa-solid fa-eye"></i>
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open_show">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Detalles del Ramo de Seguro</h2>
        </x-slot>
        <x-slot name="content">
            <div>
                @if($line->image)
                <div class="mx-auto my-2 rounded-lg w-72">
                    <img src="{{ asset('storage/' . $line->image) }}" alt="{{ $line->name }}" class="w-full h-auto rounded-lg">
                </div>
                @else

                @endif
                <div class="md:px-5 pb-5">
                    <div class="md:mx-6">
                        <h5 class="mb-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                            {{ $line->name }}</h5>
                        <div class="text-lg text-start">
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Compañía:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $line->insuranceCompany->name }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Descripción:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $line->description }}</p>
                            </div>
                            <div>
                                @if ($line->is_active)
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
                <x-secondary-button wire:click="$set('open_show', false)" class="text-gray-500 bg-gray-200 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-500 hover:text-white">
                    Salir
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
