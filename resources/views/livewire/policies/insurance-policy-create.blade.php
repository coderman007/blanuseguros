<div class="my-auto">
    <button wire:click="$set('open', true)" class="absolute right-10 top-4 px-4 pb-2 rounded-md text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-plus text-xl"></i> Agregar
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center text-yellow-500 hover:text-white w-full hover:bg-[#295083] bg-[#173152] p-4 rounded-2xl font-bold border-2 border-gray-100">NUEVA PÓLIZA</h2>
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

                    <div>
                        <!-- Dropdown para Ramo -->
                        <x-label value="Ramo" class=" hover:text-yellow-700 pb-2" />
                        <select class="w-full bg-yellow-200 border-2 border-yellow-700 shadow-sm shadow-yellow-700 rounded-md" wire:model="insurance_line_id">
                            <option value="" class="hidden">Selecciona un ramo</option>
                            @foreach ($insurance_lines as $line)
                            <option class="text-[#173152] bg-yellow-100 text-lg" value="{{ $line->id }}">{{ $line->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="insurance_line_id" />

                        <!-- Agregar campo de placa del vehículo si el ramo seleccionado es seguro de vehículo -->
                        @if ($insurance_line_id && $insurance_lines->find($insurance_line_id)->name == 'Seguro de Automóvil')
                        <x-label value="Placa del Vehículo" class="pb-2 text-gray-700 hover:text-yellow-700" />
                        <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model.defer="vehicle_plate" />
                        <x-input-error for="vehicle_plate" />
                        @endif

                        <!-- Agregar campo de número de contrato si el ramo seleccionado es Responsabilidad Civil o Cumplimiento -->
                        @if ($insurance_line_id && in_array($insurance_lines->find($insurance_line_id)->name, ['Seguro de Responsabilidad Civil', 'Seguro de Cumplimiento']))
                        <x-label value="Número de Contrato" class="pb-2 text-gray-700 hover:text-yellow-700" />
                        <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="text" wire:model.defer="contract_number" />
                        <x-input-error for="contract_number" />
                        @endif
                    </div>

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
                    <x-label value="Forma de Pago" class=" hover:text-yellow-700 pb-2" />
                    <select class="w-full bg-yellow-200 shadow-sm shadow-yellow-700 border-2 border-yellow-700 rounded-md" wire:model="payment_method">
                        <option value="" class="hidden">Selecciona una forma de pago</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Credit Card">Tarjeta de Crédito</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Debit Card">Tarjeta de Débito</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Bank Transfer">Transferencia Bancaria</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Cash">Efectivo</option>
                        <option class="text-[#173152] bg-yellow-100 text-lg" value="Other">Otro</option>
                    </select>
                    <x-input-error for="payment_method" />

                    <!-- Valor Prima Neta -->
                    <x-label value="Valor Prima Neta" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="net_premium" />
                    <x-input-error for="net_premium" />

                    <!-- Porcentaje de IVA -->
                    <x-label value="Porcentaje de IVA" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" max="100" wire:model="value_added_tax" />
                    <x-input-error for="value_added_tax" />

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
                    <x-input-error for="end_date" />

                    <!-- Fecha de Pago -->
                    <x-label value="Fecha de Pago" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="date" wire:model="payment_date" />
                    <x-input-error for="payment_date" />

                    <!-- Gastos -->
                    <x-label value="Gastos" class="pb-2 text-gray-700 hover:text-yellow-700" />
                    <x-input class="w-full border-2 border-yellow-700 shadow-md shadow-yellow-700" type="number" min="0" wire:model="expenditures" />
                    <x-input-error for="expenditures" />

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
                <x-secondary-button wire:click="$set('open', false)" class="bg-gray-700 hover:bg-gray-500 text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4">
                    Salir
                </x-secondary-button>
                <x-secondary-button wire:click="add" wire:loading.attr="disabled" wire:target="add" class="bg-[#173152] hover:bg-[#295083] text-yellow-500 hover:text-white hover:shadow-md hover:shadow-yellow-700 py-4 px-10 m-4">
                    Agregar
                </x-secondary-button>
            </div>
        </x-slot>


        {{-- <x-slot name="footer">
            <div class="mx-auto">
                <button wire:click="$set('open', false)" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    Salir
                </button>

                <button wire:click="add" wire:loading.attr="disabled" wire:target="add" type="button" class="text-white bg-gradient-to-r from-[#295083] via-blue-700 to-[#173152] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    Agregar
                </button>
            </div>
        </x-slot> --}}
    </x-dialog-modal>
</div>
