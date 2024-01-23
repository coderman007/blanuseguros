<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsurancePolicy;
use Livewire\Component;

class InsurancePolicyDelete extends Component
{
    public $openDelete = false;
    public $policyId;

    public function deleteConfirmed()
    {
        $policy = InsurancePolicy::findOrFail($this->policyId);

        $policy->delete();
        $this->emitTo('policies.insurance-policies', 'render');
        $this->emit('alert', '¡Póliza Eliminada!');
        $this->openDelete = false;
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-delete');
    }
}
