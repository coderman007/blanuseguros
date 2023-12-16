<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Livewire\Component;

class InsurancePlanShow extends Component
{
    public $open = false;
    public $line;
    public $plan;

    public function mount(InsurancePlan $plan)
    {
        $this->plan = $plan;
        $this->line = InsuranceLine::get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-show');
    }
}
