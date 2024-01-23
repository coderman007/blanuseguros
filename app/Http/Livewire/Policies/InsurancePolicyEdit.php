<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use App\Models\PolicyHolder;
use App\Models\InsurancePolicy;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyEdit extends Component
{
    use WithFileUploads;

    public $policyId, $policy, $companies, $lines, $holders;

    public $insuranceCompanyId, $insuranceLineId, $policyHolderId, $policyNumber, $startDate, $endDate, $netPremium, $expenditures, $valueAddedTax, $valueAddedTaxAmount, $totalValue, $paymentDate, $paymentMethod, $isActive;
    public $openEdit = false;

    protected $rules = [
        'insuranceCompanyId' => 'required|exists:insurance_companies,id',
        'insuranceLineId' => 'required|exists:insurance_lines,id',
        'policyHolderId' => 'required|exists:policy_holders,id',
        'policyNumber' => 'required',
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

    public function mount($policyId)
    {
        $this->policyId = $policyId;
        $this->policy = InsurancePolicy::find($this->policyId);
        $this->companies = InsuranceCompany::get(['id', 'name']);
        $this->lines = InsuranceLine::get(['id', 'name']);
        $this->holders = PolicyHolder::get(['id', 'first_name', 'last_name']);

        $this->initializeForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // Si los campos modificables se actualizan, recalcular los campos calculados
        if (in_array($propertyName, ['net_premium', 'expenditures', 'value_added_tax'])) {
            $this->calculateTotalValue();
        }
    }

    public function updatePolicy()
    {
        try {
            $this->validate();

            $this->policy->update([
                'insurance_company_id' => $this->insuranceCompanyId,
                'insurance_line_id' => $this->insuranceLineId,
                'policy_holder_id' => $this->policyHolderId,
                'policy_number' => $this->policyNumber,
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

            $this->emitTo('policies.insurance-policies', 'render');
            $this->emit('alert', '¡Póliza Actualizada Exitosamente!');
            $this->resetForm();
        } catch (\Exception $e) {
            $this->emit('error', 'Error al actualizar la póliza: ' . $e->getMessage());
        }
    }

    private function initializeForm()
    {
        $this->insuranceCompanyId = $this->policy->insurance_company_id;
        $this->insuranceLineId = $this->policy->insurance_line_id;
        $this->policyHolderId = $this->policy->policy_holder_id;
        $this->policyNumber = $this->policy->policy_number;
        $this->startDate = $this->policy->start_date;
        $this->endDate = $this->policy->end_date;
        $this->netPremium = $this->policy->net_premium;
        $this->expenditures = $this->policy->expenditures;
        $this->valueAddedTax = $this->policy->value_added_tax;
        $this->totalValue = $this->policy->total_value;
        $this->paymentDate = $this->policy->payment_date;
        $this->paymentMethod = $this->policy->payment_method;
        $this->isActive = $this->policy->is_active;
    }

    private function calculateTotalValue()
    {
        // Calcular el IVA en base al valor del campo 'net_premium' y el porcentaje de IVA
        $this->valueAddedTaxAmount = ($this->netPremium * $this->valueAddedTax) / 100;

        // Calcular el valor total sumando la prima neta, el IVA y los gastos
        $this->totalValue = $this->netPremium + $this->valueAddedTaxAmount + $this->expenditures;
    }

    private function resetForm()
    {
        $this->reset([
            'openEdit',
            'insuranceCompanyId',
            'insuranceLineId',
            'policyHolderId',
            'policyNumber',
            'startDate',
            'endDate',
            'netPremium',
            'expenditures',
            'valueAddedTax',
            'totalValue',
            'paymentDate',
            'paymentMethod',
            'isActive',
        ]);
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-edit');
    }
}
