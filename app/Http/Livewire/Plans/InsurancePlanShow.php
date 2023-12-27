<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsurancePlan;
use Livewire\Component;

class InsurancePlanShow extends Component
{
    public $open_show = false;
    public $line;
    public $plan;

    public function mount(InsurancePlan $plan)
    {
        $this->plan = $plan;
        $this->line = $plan->insuranceLine::get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-show');
    }
}
