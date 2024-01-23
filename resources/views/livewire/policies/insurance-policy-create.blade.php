<div class="my-auto">
    <!-- Botón para agregar pólizas -->
    <button wire:click.prevent="$set('openCreate', true)" class="absolute right-10 top-4 px-4 py-2 rounded-md text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-plus text-xl"></i> Agregar
    </button>

    <x-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center text-yellow-500 hover:text-white w-full hover:bg-[#295083] bg-[#173152] p-4 rounded-2xl font-bold border-2 border-gray-100">NUEVA PÓLIZA</h2>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <!-- Dropdown para Compañía de Seguros -->
                    <x-label value="Compañía de Seguros" class=" hover:text-yellow-700 pb-2" />
                    <select class="w-full border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md bg-yellow-200" wire:model="insuranceCompanyId">
                        <option value="" class="hidden">Selecciona una compañía de seguros</option>
                        @foreach ($companies as $company)
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="insuranceCompanyId" />

                    <div>
                        <!-- Dropdown para Ramos de Seguros -->
                        <x-label value="Ramo" class=" hover:text-yellow-700 pb-2" />
                        <select class="w-full bg-yellow-200 border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md" wire:model="insuranceLineId">
                            <option value="" class="hidden">Selecciona un ramo</option>
                            @foreach ($lines as $line)
                            <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $line->id }}">{{ $line->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="insuranceLineId" />

                        <!-- Agregar campo de placa del vehículo si el ramo seleccionado es seguro de vehículo -->
                        @if ($insuranceLineId && $lines->find($insuranceLineId)->name == 'Seguro de Automóvil')
                        <x-label value="Placa del Vehículo" class="pb-2 text-gray-700 hover:text-yellow-700" />
                        <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model="vehiclePlate" />
                        <x-input-error for="vehiclePlate" />
                        @endif

                        <!-- Agregar campo de número de contrato si el ramo seleccionado es Responsabilidad Civil o Cumplimiento -->
                        @if ($insuranceLineId && in_array($lines->find($insuranceLineId)->name, ['Seguro de Responsabilidad Civil', 'Seguro de Cumplimiento']))
                        <x-label value="Número de Contrato" class="pb-2 text-gray-700 hover:text-yellow-700" />
                        <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model="contractNumber" />
                        <x-input-error for="contractNumber" />
                        @endif
                    </div>

                    <!-- Dropdown para Tomador de Póliza -->
                    <x-label value="Tomador de Póliza" class=" hover:text-yellow-700 pb-2" />
                    <select class="bg-yellow-200 w-full border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md" wire:model="policyHolderId">
                        <option value="" class="hidden">Selecciona un tomador de póliza</option>
                        @foreach ($holders as $holder)
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $holder->id }}">{{ $holder->first_name . ' ' . $holder->last_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="policyHolderId" />

                    <!-- Forma de Pago -->
                    <x-label value="Forma de Pago" class=" hover:text-yellow-700 pb-2" />
                    <select class="w-full bg-yellow-200 shadow-sm shadow-yellow-700 border-2 border-yellow-700 rounded-md" wire:model="paymentMethod">
                        <option value="" class="hidden">Selecciona una forma de pago</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Credit Card">Tarjeta de Crédito</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Debit Card">Tarjeta de Débito</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Bank Transfer">Transferencia Bancaria</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Cash">Efectivo</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Other">Otro</option>
                    </select>
                    <x-input-error for="paymentMethod" />

                    <!-- Valor Prima Neta -->
                    <x-label value="Valor Prima Neta" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="netPremium" />
                    <x-input-error for="netPremium" />

                    <!-- Porcentaje de IVA -->
                    <x-label value="Porcentaje de IVA" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" max="100" wire:model="valueAddedTax" />
                    <x-input-error for="valueAddedTax" />

                </div>
                <div>

                    <!-- Número de Póliza -->
                    <x-label value="Número de Póliza" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model="policyNumber" />
                    <x-input-error for="policyNumber" />

                    <!-- Fecha de Inicio -->
                    <x-label value="Fecha de Inicio" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="startDate" />
                    <x-input-error for="startDate" />

                    <!-- Fecha de Fin -->
                    <x-label value="Fecha de Fin" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="endDate" />
                    <x-input-error for="endDate" />

                    <!-- Fecha de Pago -->
                    <x-label value="Fecha de Pago" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="paymentDate" />
                    <x-input-error for="paymentDate" />

                    <!-- Gastos -->
                    <x-label value="Gastos" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="expenditures" />
                    <x-input-error for="expenditures" />

                    <!-- Valor del IVA (Mostrar solo si se ha ingresado el porcentaje de IVA) -->
                    @if ($valueAddedTax > 0)
                    <x-label value="Valor del IVA" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="valueAddedTaxAmount" readonly />
                    <x-input-error for="valueAddedTaxAmount" />
                    @endif

                </div>

                <div>

                    <!-- Estado -->
                    <x-label value="Estado" class="text-gray-700" />
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="isActive" class="ml-2 mr-4 my-4">
                        <span class="{{ $isActive ? 'text-green-500' : 'text-red-500' }} text-lg">{{ $isActive ? 'Vigente' : 'Vencida' }}</span>
                    </div>
                    <x-input-error for="isActive" />
                </div>
                <div>
                    <!-- Valor Total (Mostrar solo si se han ingresado los valores previos) -->
                    @if ($totalValue > 0)
                    <x-label value="TOTAL" class="hover:text-yellow-700 text-green-700 pb-2 text-center" />
                    <x-input class="w-full border-2 text-3xl border-green-700 shadow-md shadow-green-700 bg-green-100 text-center text-green-700" type="number" min="0" wire:model="totalValue" readonly />
                    <x-input-error for="totalValue" />
                    @endif
                </div>


        </x-slot>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button wire:click="$set('openCreate', false)" class="bg-gray-700 hover:bg-gray-500 text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4">
                    Salir
                </x-secondary-button>
                <x-secondary-button wire:click="add" wire:loading.attr="disabled" wire:target="add" class="bg-[#173152] hover:bg-[#295083] text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4">
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
