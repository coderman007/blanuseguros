<?php

namespace App\Http\Livewire\Plans;

use Livewire\Component;
use App\Models\InsuranceLine;
use App\Models\InsurancePlan;

class InsurancePlanShow extends Component
{
    public $open = false;
    public $lines;
    public $plan;

    public function mount(InsurancePlan $plan)
    {
        $this->plan = $plan;
        $this->lines = InsuranceLine::get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-show');
    }
}
