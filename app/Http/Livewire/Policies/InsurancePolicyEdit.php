<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsurancePolicy;
use App\Models\InsuranceLine;
use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyEdit extends Component
{
    use WithFileUploads;

    public $policyId;
    public $insurancePolicy;
    public $insurance_lines;

    public $insurance_company_id, $insurance_line_id, $policy_holder_id, $policy_number, $start_date, $end_date, $net_premium, $expenditures, $value_added_tax, $value_added_tax_amount, $total_value, $payment_date, $payment_method;
    public $open = false;

    protected $rules = [
        'insurance_company_id' => 'required|exists:insurance_companies,id',
        'insurance_line_id' => 'required|exists:insurance_lines,id',
        'policy_holder_id' => 'required|exists:policy_holders,id',
        'policy_number' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'net_premium' => 'required|numeric|min:0',
        'expenditures' => 'required|numeric|min:0',
        'value_added_tax' => 'required|numeric|min:0|max:100',
        'total_value' => 'required|numeric|min:0',
        'payment_date' => 'required|date|after:start_date',
        'payment_method' => 'required',
    ];

    public function mount()
    {
        $this->insurancePolicy = InsurancePolicy::find($this->policyId);
        $this->insurance_lines = InsuranceLine::all();

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

            $this->insurancePolicy->update([
                'insurance_company_id' => $this->insurance_company_id,
                'insurance_line_id' => $this->insurance_line_id,
                'policy_holder_id' => $this->policy_holder_id,
                'policy_number' => $this->policy_number,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'net_premium' => $this->net_premium,
                'expenditures' => $this->expenditures,
                'value_added_tax' => $this->value_added_tax,
                'total_value' => $this->total_value,
                'payment_date' => $this->payment_date,
                'payment_method' => $this->payment_method,
            ]);

            $this->emitTo('policies.insurance-policies', 'render');
            $this->emit('alert', '¡Póliza Editada Exitosamente!');
            $this->resetForm();
        } catch (\Exception $e) {
            $this->emit('error', 'Error al actualizar la póliza: ' . $e->getMessage());
        }
    }

    private function initializeForm()
    {
        $this->insurance_company_id = $this->insurancePolicy->insurance_company_id;
        $this->insurance_line_id = $this->insurancePolicy->insurance_line_id;
        $this->policy_holder_id = $this->insurancePolicy->policy_holder_id;
        $this->policy_number = $this->insurancePolicy->policy_number;
        $this->start_date = $this->insurancePolicy->start_date;
        $this->end_date = $this->insurancePolicy->end_date;
        $this->net_premium = $this->insurancePolicy->net_premium;
        $this->expenditures = $this->insurancePolicy->expenditures;
        $this->value_added_tax = $this->insurancePolicy->value_added_tax;
        $this->total_value = $this->insurancePolicy->total_value;
        $this->payment_date = $this->insurancePolicy->payment_date;
        $this->payment_method = $this->insurancePolicy->payment_method;
    }

    private function calculateTotalValue()
    {
        // Calcular el IVA en base al valor del campo 'net_premium' y el porcentaje de IVA
        $this->value_added_tax_amount = ($this->net_premium * $this->value_added_tax) / 100;

        // Calcular el valor total sumando la prima neta, el IVA y los gastos
        $this->total_value = $this->net_premium + $this->value_added_tax_amount + $this->expenditures;
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'insurance_company_id',
            'insurance_line_id',
            'policy_holder_id',
            'policy_number',
            'start_date',
            'end_date',
            'net_premium',
            'expenditures',
            'value_added_tax',
            'total_value',
            'payment_date',
            'payment_method',
        ]);
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-edit', [
            'insurance_companies' => InsuranceCompany::all(),
            'policy_holders' => PolicyHolder::all(),
            'insurance_lines' => $this->insurance_lines,
        ]);
    }
}
