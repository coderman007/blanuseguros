<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-green-400 rounded hover:text-white hover:bg-green-500 fa-solid fa-eye"></i>
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h5 class="mb-4 mt-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                {{ $company->name }}
            </h5>
        </x-slot>

        <x-slot name="content">
            <div class="px-5 pb-5">
                <div class="mx-6">

                    <div class="text-lg text-start">
                        <div class="mx-auto my-2 rounded-lg w-72">
                            <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}" class="w-full h-auto rounded-lg">
                        </div>
                        <p><strong>URL:</strong> {{ $company->url }}</p>
                        <p><strong>Dirección:</strong> {{ $company->address }}</p>
                        <p><strong>Teléfono:</strong> {{ $company->phone }}</p>
                        <p><strong>Correo Electrónico:</strong> {{ $company->email }}</p>
                        <div>
                            @if ($company->is_active)
                            <p><strong>Estado:</strong></p>
                            <p class="p-2 text-gray-100 bg-green-600 rounded-md">Activa</p>
                            @else
                            <p><strong>Estado:</strong></p>
                            <p class="p-2 text-gray-100 bg-red-400 rounded-md">Inactiva</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('open', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                    Salir
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
