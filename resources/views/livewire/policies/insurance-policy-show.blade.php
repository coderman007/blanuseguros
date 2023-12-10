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
                Póliza N° {{ $policy->policy_number }}
            </h5>
        </x-slot>

        <x-slot name="content">
            <div class="px-5 pb-5">
                <div class="mx-6">

                    <div class="text-lg text-start">
                        <p><strong>Fecha de Inicio:</strong> {{ $policy->start_date }}</p>
                        <p><strong>Fecha de Fin:</strong> {{ $policy->end_date }}</p>
                        <p><strong>Monto de Prima:</strong> {{ $policy->premium_amount }}</p>
                        <p><strong>Compañía:</strong> {{ $policy->insuranceLine->insuranceCompany->name }}</p>
                        <p><strong>Ramo:</strong> {{ $policy->insuranceLine->name }}</p>
                        <p><strong>Plan:</strong> {{ optional($policy->insuranceLine->insurancePlans->first())->name }}</p>
                        <div>
                            <h5 class="mb-4 mt-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                                Información del tomador de la póliza
                            </h5>
                            <div class="mx-auto my-2 rounded-lg w-72">
                                <img src="{{ asset('storage/' . $policy->policyHolder->image) }}" alt="{{ $policy->policyHolder->first_name . $policy->policyHolder->last_name }}" class="w-full h-auto rounded-lg">
                            </div>
                            <p><strong>Nombre Completo:</strong> {{ $policy->policyHolder->first_name }} {{ $policy->policyHolder->last_name }}</p>
                            <p><strong>correo Electrónico:</strong> {{ $policy->policyHolder->email }}</p>
                            <p><strong>Dirección:</strong> {{ $policy->policyHolder->address }}</p>
                            <p><strong>Teléfono:</strong> {{ $policy->policyHolder->phone }}</p>
                        </div>

                        <h5 class="mb-4 mt-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                            Información de benficiarios
                        </h5>
                        <ul>
                            @forelse ($policy->policyHolder->beneficiaries as $beneficiary)
                            <div class="mx-auto my-2 rounded-lg w-72">
                                <img src="{{ asset('storage/' . $beneficiary->image) }}" alt="{{ $beneficiary->name }}" class="w-full h-auto rounded-lg">
                            </div>
                            <li>{{ $beneficiary->name }}</li>
                            <li>{{$beneficiary->email}}</li>
                            <li>{{$beneficiary->address}}</li>
                            <li>{{$beneficiary->phone}}</li>
                            @empty
                            <li>No hay beneficiarios registrados</li>
                            @endforelse
                        </ul>
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
