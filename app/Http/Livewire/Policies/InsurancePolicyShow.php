<?php

namespace App\Http\Livewire\Policies;

use App\Models\Beneficiary;
use App\Models\InsuranceCompany;
use App\Models\InsurancePlan;
use App\Models\InsurancePolicy;
use App\Models\Line;
use App\Models\PolicyHolder;
use Livewire\Component;

class InsurancePolicyShow extends Component
{
    public $open = false;
    public $policy;
    public $company;
    public $line;
    public $plan;
    public $holder;
    public $beneficiary;

    public function mount(InsurancePolicy $policy)
    {
        $this->policy = $policy;
        $this->company = InsuranceCompany::get(['id', 'name']);
        $this->line = Line::get(['id', 'name']);
        $this->plan = InsurancePlan::get(['id', 'title']);
        $this->holder = PolicyHolder::get(['id', 'first_name', 'last_name']);
        $this->beneficiary = Beneficiary::get(['id', 'name']);
    }
    
    public function render()
    {
        return view('livewire.policies.insurance-policy-show');
    }
}
