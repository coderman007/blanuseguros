<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsurancePolicy;
use App\Models\InsuranceLine;
use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyCreate extends Component
{
    use WithFileUploads;

    public $insurance_companies;
    public $insurance_lines;
    public $policy_holders;

    public $insurance_company_id, $insurance_line_id, $policy_holder_id;
    public $policy_number, $vehicle_plate, $contract_number, $start_date, $end_date,  $net_premium, $expenditures, $value_added_tax, $value_added_tax_amount, $total_value, $payment_date, $payment_method;
    public $open = false;

    protected $rules = [
        'insurance_company_id' => 'required|exists:insurance_companies,id',
        'insurance_line_id' => 'required|exists:insurance_lines,id',
        'policy_holder_id' => 'required|exists:policy_holders,id',
        'policy_number' => 'required|unique:insurance_policies,policy_number',
        'vehicle_plate' => 'nullable|required_if:insurance_line_id,2|max:10', // Ajusta el valor 2 según el ID real del seguro de vehículo
        'contract_number' => 'nullable|required_if:insurance_line_id,3,4|max:255', // Ajusta los valores 3 y 4 según los IDs reales de Responsabilidad Civil y Cumplimiento
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
        $this->insurance_companies = InsuranceCompany::all();
        $this->insurance_lines = InsuranceLine::all();
        $this->policy_holders = PolicyHolder::all();
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
        $this->value_added_tax_amount = ($this->net_premium * $this->value_added_tax) / 100;

        // Calcular el valor total sumando la prima neta, el IVA y los gastos
        $this->total_value = $this->net_premium + $this->value_added_tax_amount + $this->expenditures;
    }

    public function add()
    {
        try {
            $this->validate();
            $this->calculateTotalValue();

            InsurancePolicy::create([
                'insurance_company_id' => $this->insurance_company_id,
                'insurance_line_id' => $this->insurance_line_id,
                'policy_holder_id' => $this->policy_holder_id,
                'policy_number' => $this->policy_number,
                'vehicle_plate' => $this->vehicle_plate,
                'contract_number' => $this->contract_number,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'net_premium' => $this->net_premium,
                'expenditures' => $this->expenditures,
                'value_added_tax' => $this->value_added_tax,
                'total_value' => $this->total_value,
                'payment_date' => $this->payment_date,
                'payment_method' => $this->payment_method,
            ]);
            $this->resetForm();
            $this->emitTo('policies.insurance-policies', 'render');
            $this->emit('alert', '¡Póliza Creada Exitosamente!');
        } catch (\Exception $e) {
            // Manejar el error y mostrar un mensaje al usuario
            $this->emit('error', 'Error al crear la póliza: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'insurance_company_id',
            'insurance_line_id',
            'policy_holder_id',
            'policy_number',
            'vehicle_plate',
            'contract_number',
            'start_date',
            'end_date',
            'net_premium',
            'expenditures',
            'value_added_tax',
            'value_added_tax_amount',
            'payment_date',
            'payment_method',
            'total_value',
        ]);
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-create');
    }
}
