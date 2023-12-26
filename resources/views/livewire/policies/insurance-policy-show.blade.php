<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open', true)">
        <i class="p-1 text-green-600 rounded hover:text-white hover:bg-green-700 fa-solid fa-eye"></i>
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-800 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 dark:bg-gray-600 dark:hover:bg-gray-700 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
            </svg>
        </div>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h5 class="mb-4 mt-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                Póliza N° <span class="text-blue-600">{{ $policy->policy_number }}</span>
                @if ($policy->insuranceLine->name == 'Seguro de Automóvil')
                <!-- Mostrar información de placa de vehículo -->
                <p><strong class="text-blue-600">Placa del Vehículo:</strong> {{ $policy->vehicle_plate }}</p>
                @elseif ($policy->insuranceLine->name == 'Seguro de Cumplimiento' || $policy->insuranceLine->name == 'Seguro de Responsabilidad Civil')
                <!-- Mostrar información de número de contrato -->
                <p><strong class="text-blue-600">Número de Contrato:</strong> {{ $policy->contract_number }}</p>
                @endif
            </h5>
        </x-slot>

        <x-slot name="content">
            <div class="bg-gray-100 dark:bg-gray-900 p-8 rounded-lg shadow-md">
                <div class="text-center mb-6">
                    <img src="{{ asset('storage/' . $policy->policyHolder->image) }}" alt="{{ $policy->policyHolder->first_name . $policy->policyHolder->last_name }}" class="w-32 h-32 mx-auto mb-4 rounded-full border-4 border-blue-600">
                    <h5 class="mt-4 text-2xl font-semibold">{{ $policy->policyHolder->first_name }} {{ $policy->policyHolder->last_name }}</h5>
                    <p class="text-gray-600 dark:text-gray-400">{{ $policy->policyHolder->email }}</p>
                </div>

                <div class="mb-8">
                    <h5 class="text-xl font-semibold mb-4">Detalles del Tomador de la Póliza</h5>
                    <p><strong class="text-blue-600">Documento de Identidad:</strong> {{ $policy->policyHolder->document }}</p>
                    <p><strong class="text-blue-600">Dirección:</strong> {{ $policy->policyHolder->address }}</p>
                    <p><strong class="text-blue-600">Teléfono:</strong> {{ $policy->policyHolder->phone }}</p>
                </div>

                <div class="mb-8">
                    <h5 class="mb-4 mt-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                        Beneficiarios
                    </h5>
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($policy->policyHolder->beneficiaries as $beneficiary)
                        <li class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                            <div class="relative w-full h-32 mb-4 overflow-hidden">
                                <img src="{{ asset('storage/' . $beneficiary->image) }}" alt="{{ $beneficiary->name }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $beneficiary->name }}</p>
                            <p class="text-gray-500 dark:text-gray-400">{{ $beneficiary->email }}</p>
                        </li>
                        @empty
                        <li class="col-span-full">No hay beneficiarios registrados</li>
                        @endforelse
                    </ul>
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
