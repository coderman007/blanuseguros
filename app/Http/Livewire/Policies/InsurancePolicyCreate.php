<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use App\Models\PolicyHolder;
use App\Models\InsurancePolicy;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyCreate extends Component
{
    use WithFileUploads;

    public $companies;
    public $lines;
    public $holders;

    public $insuranceCompanyId, $insuranceLineId, $policyHolderId;
    public $policyNumber, $vehiclePlate, $contractNumber, $startDate, $endDate,  $netPremium, $expenditures, $valueAddedTax, $valueAddedTaxAmount, $totalValue, $paymentDate, $paymentMethod, $isActive;
    public $openCreate = false;

    protected $rules = [
        'insuranceCompanyId' => 'required|exists:insurance_companies,id',
        'insuranceLineId' => 'required|exists:insurance_lines,id',
        'policyHolderId' => 'required|exists:policy_holders,id',
        'policyNumber' => 'required',
        'vehiclePlate' => 'nullable|required_if:insurance_line_id,2|max:10', // Ajusta el valor 2 según el ID real del seguro de vehículo
        'contractNumber' => 'nullable|required_if:insurance_line_id,3,4|max:255', // Ajusta los valores 3 y 4 según los IDs reales de Responsabilidad Civil y Cumplimiento
        'startDate' => 'required|date',
        'endDate' => 'required|date|after:start_date',
        'netPremium' => 'required|numeric|min:0',
        'expenditures' => 'required|numeric|min:0',
        'valueAddedTax' => 'required|numeric|min:0|max:100',
        'totalValue' => 'required|numeric|min:0',
        'paymentDate' => 'required|date|after:start_date',
        'paymentMethod' => 'required',
        'isActive' => 'required|boolean',
    ];

    public function mount()
    {
        $this->companies = InsuranceCompany::get(['id', 'name']);
        $this->lines = InsuranceLine::get(['id', 'name']);
        $this->holders = PolicyHolder::get(['id', 'first_name', 'last_name']);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedNetPremium()
    {
        $this->calculateTotalValue();
    }

    public function updatedExpenditures()
    {
        $this->calculateTotalValue();
    }

    public function updatedValueAddedTax()
    {
        $this->calculateTotalValue();
    }

    private function calculateTotalValue()
    {
        // Calcular el IVA en base al valor del campo 'net_premium' y el porcentaje de IVA
        $this->valueAddedTaxAmount = ($this->netPremium * $this->valueAddedTax) / 100;

        // Calcular el valor total sumando la prima neta, el IVA y los gastos
        $this->totalValue = $this->netPremium + $this->valueAddedTaxAmount + $this->expenditures;
    }

    public function add()
    {
        try {
            $this->validate();
            $this->calculateTotalValue();

            InsurancePolicy::create([
                'insurance_company_id' => $this->insuranceCompanyId,
                'insurance_line_id' => $this->insuranceLineId,
                'policy_holder_id' => $this->policyHolderId,
                'policy_number' => $this->policyNumber,
                'vehicle_plate' => $this->vehiclePlate,
                'contract_number' => $this->contractNumber,
                'start_date' => $this->startDate,
                'end_date' => $this->endDate,
                'net_premium' => $this->netPremium,
                'expenditures' => $this->expenditures,
                'value_added_tax' => $this->valueAddedTax,
                'total_value' => $this->totalValue,
                'payment_date' => $this->paymentDate,
                'payment_method' => $this->paymentMethod,
                'is_active' => $this->isActive,
            ]);
            $this->resetForm();
            $this->emitTo('policies.insurance-policies', 'render');
            $this->emit('alert', '¡Póliza Creada Exitosamente!');
        } catch (\Exception $e) {
            $this->emit('error', 'Error al crear la póliza: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'openCreate',
            'insuranceCompanyId',
            'insuranceLineId',
            'policyHolderId',
            'policyNumber',
            'vehiclePlate',
            'contractNumber',
            'startDate',
            'endDate',
            'netPremium',
            'expenditures',
            'valueAddedTax',
            'valueAddedTaxAmount',
            'paymentDate',
            'paymentMethod',
            'totalValue',
            'isActive',
        ]);
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-create');
    }
}
