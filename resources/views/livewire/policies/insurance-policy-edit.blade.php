<div class="bg-gray-300">
    <a href="#" wire:click="$set('open', true)" class="flex items-center p-1 space-x-1 text-blue-400 rounded hover:text-white hover:bg-blue-500">
        <i class="fa-solid fa-pen-to-square"></i>
        <span class="hidden group-hover:inline">Editar</span>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center text-yellow-500 hover:text-white w-full hover:bg-[#295083] bg-[#173152] p-4 rounded-2xl font-bold border-2 border-gray-100">Editar Póliza</h2>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <!-- Dropdown para Compañía de Seguros -->
                    <x-label value="Compañía de Seguros" class=" hover:text-yellow-700 pb-2" />
                    <select class="w-full border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md bg-yellow-200" wire:model="insurance_company_id">
                        <option value="" class="hidden">Selecciona una compañía de seguros</option>
                        @foreach ($insurance_companies as $company)
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="insurance_company_id" />

                    <!-- Dropdown para Ramo -->
                    <x-label value="Ramo" class=" hover:text-yellow-700 pb-2" />
                    <select class="w-full bg-yellow-200 border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md" wire:model="insurance_line_id">
                        <option value="" class="hidden">Selecciona un ramo</span></option>
                        @foreach ($insurance_lines as $line)
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $line->id }}">{{ $line->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="insurance_line_id" />

                    <!-- Dropdown para Tomador de Póliza -->
                    <x-label value="Tomador de Póliza" class=" hover:text-yellow-700 pb-2" />
                    <select class="bg-yellow-200 w-full border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md" wire:model="policy_holder_id">
                        <option value="" class="hidden">Selecciona un tomador de póliza</option>
                        @foreach ($policy_holders as $holder)
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $holder->id }}">{{ $holder->first_name . ' ' . $holder->last_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="policy_holder_id" />

                    <!-- Forma de Pago -->
                    <x-label value="Forma de Pago" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <select class="w-full bg-yellow-200 border-2 border-yellow-700 shadow-md shadow-yellow-700 rounded-md" wire:model="payment_method">
                        <option value="" class="hidden">Selecciona una forma de pago</option>
                        <option value="Credit Card" class="text-[#173152] bg-yellow-100 text-lg">Tarjeta de Crédito</option>
                        <option value="Debit Card" class="text-[#173152] bg-yellow-100 text-lg">Tarjeta de Débito</option>
                        <option value="Bank Transfer" class="text-[#173152] bg-yellow-100 text-lg">Transferencia Bancaria</option>
                        <option value="Cash" class="text-[#173152] bg-yellow-100 text-lg">Efectivo</option>
                        <option value="Other" class="text-[#173152] bg-yellow-100 text-lg">Otro</option>
                    </select>
                    <x-input-error for="payment_method" />

                    <!-- Valor Prima Neta -->
                    <x-label value="Valor Prima Neta" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="net_premium" />
                    <x-input-error for="net_premium" />

                    <!-- Porcentaje de IVA -->
                    <x-label value="Porcentaje de IVA" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" max="100" wire:model="value_added_tax" />

                </div>
                <div>

                    <!-- Número de Póliza -->
                    <x-label value="Número de Póliza" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model="policy_number" />
                    <x-input-error for="policy_number" />

                    <!-- Fecha de Inicio -->
                    <x-label value="Fecha de Inicio" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="start_date" />
                    <x-input-error for="start_date" />

                    <!-- Fecha de Fin -->
                    <x-label value="Fecha de Fin" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="end_date" />

                    <!-- Fecha de Pago -->
                    <x-label value="Fecha de Pago" class="text-gray-700 hover:text-yellow-700 pb-2" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="payment_date" />
                    <x-input-error for="payment_date" />


                    <!-- Gastos -->
                    <x-label value="Gastos" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="expenditures" />

                    <!-- Valor del IVA (Mostrar solo si se ha ingresado el porcentaje de IVA) -->
                    @if ($value_added_tax > 0)
                    <x-label value="Valor del IVA" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="value_added_tax_amount" readonly />
                    <x-input-error for="value_added_tax_amount" />
                    @endif
                </div>
                <div class="col-span-2">
                    <!-- Valor Total (Mostrar solo si se han ingresado los valores previos) -->
                    @if ($total_value > 0)
                    <x-label value="TOTAL" class="hover:text-yellow-700 text-green-700 pb-2 text-center" />
                    <x-input class="w-full border-2 text-3xl border-green-700 shadow-md shadow-green-700 bg-green-100 text-center text-green-700" type="number" min="0" wire:model="total_value" readonly />
                    <x-input-error for="total_value" />
                    @endif
                </div>

        </x-slot>

        <x-slot name="footer">
            <div class="mx-auto">
                <x-secondary-button class="bg-gray-700 hover:bg-gray-500 text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4" wire:click="$set('open', false)">
                    Salir
                </x-secondary-button>
                <x-secondary-button class="bg-[#173152] hover:bg-[#295083] text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4" wire:click="updatePolicy" wire:loading.attr="disabled" wire:target="updatePolicy">
                    Actualizar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
