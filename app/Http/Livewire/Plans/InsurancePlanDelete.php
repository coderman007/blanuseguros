<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsurancePlan;
use Livewire\Component;

class InsurancePlanDelete extends Component
{
    public $open = false;
    public $planId;

    public function deleteConfirmed()
    {
        $plan = InsurancePlan::find($this->planId);

        $plan->delete();
        $this->emitTo('plans.insurance-plans', 'render');
        $this->emit('alert', 'Plan Eliminado!');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-delete');
    }
}
