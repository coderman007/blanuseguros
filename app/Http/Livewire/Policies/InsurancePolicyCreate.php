<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsurancePolicy;
use App\Models\Line;
use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyCreate extends Component
{
    use WithFileUploads;

    public $insurance_companies;
    public $lines;
    public $policy_holders;

    public $insurance_company_id, $line_id, $policy_holder_id;
    public $policy_number, $start_date, $end_date, $premium_amount;
    public $open = false;

    protected $rules = [
        'insurance_company_id' => 'required|exists:insurance_companies,id',
        'line_id' => 'required|exists:lines,id',
        'policy_holder_id' => 'required|exists:policy_holders,id',
        'policy_number' => 'required|unique:insurance_policies,policy_number',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'premium_amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->insurance_companies = InsuranceCompany::all();
        $this->lines = Line::all();
        $this->policy_holders = PolicyHolder::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        InsurancePolicy::create([
            'insurance_company_id' => $this->insurance_company_id,
            'line_id' => $this->line_id,
            'policy_holder_id' => $this->policy_holder_id,
            'policy_number' => $this->policy_number,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'premium_amount' => $this->premium_amount,
        ]);

        $this->resetForm();
        $this->emitTo('policies.insurance-policies-table', 'render');
        $this->emit('alert', '¡Póliza Creada Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'insurance_company_id',
            'line_id',
            'policy_holder_id',
            'policy_number',
            'start_date',
            'end_date',
            'premium_amount',
        ]);
    }
    
    public function render()
    {
        return view('livewire.policies.insurance-policy-create');
    }
}
