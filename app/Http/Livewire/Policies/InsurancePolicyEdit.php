<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsurancePolicy;
use App\Models\Line;
use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePolicyEdit extends Component
{
    use WithFileUploads;

    public $policyId;
    public $insurance_companies, $insurancePolicy;
    public $lines;
    public $policy_holders;

    public $insurance_company_id, $line_id, $policy_holder_id;
    public $policy_number, $start_date, $end_date, $premium_amount;
    public $open = false;

    protected $rules = [
        'insurance_company_id' => 'required|exists:insurance_companies,id',
        'line_id' => 'required|exists:lines,id',
        'policy_holder_id' => 'required|exists:policy_holders,id',
        'policy_number' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'premium_amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->insurance_companies = InsuranceCompany::all();
        $this->lines = Line::all();
        $this->policy_holders = PolicyHolder::all();

        $this->insurancePolicy = InsurancePolicy::find($this->policyId);
        $this->insurance_company_id = $this->insurancePolicy->insuranceCompany->id;
        $this->line_id = $this->insurancePolicy->line->id;
        $this->policy_holder_id = $this->insurancePolicy->policyHolder->id;
        $this->policy_number = $this->insurancePolicy->policy_number;
        $this->start_date = $this->insurancePolicy->start_date;
        $this->end_date = $this->insurancePolicy->end_date;
        $this->premium_amount = $this->insurancePolicy->premium_amount ;

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        $this->insurancePolicy->insurance_company_id = $this->insurance_company_id;
        $this->insurancePolicy->line_id = $this->line_id;
        $this->insurancePolicy->policy_holder_id = $this->policy_holder_id;
        $this->insurancePolicy->policy_number = $this->policy_number;
        $this->insurancePolicy->start_date = $this->start_date;
        $this->insurancePolicy->end_date = $this->end_date;
        $this->insurancePolicy->premium_amount = $this->premium_amount;
        $this->insurancePolicy->save();
        
        $this->emitTo('policies.insurance-policies-table', 'render');
        $this->emit('alert', '¡Póliza Editada Exitosamente!');
    }
    
    public function render()
    {
        return view('livewire.policies.insurance-policy-edit');
    }
}
