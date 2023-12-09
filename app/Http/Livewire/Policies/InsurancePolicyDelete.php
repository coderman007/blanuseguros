<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsurancePolicy;
use Livewire\Component;

class InsurancePolicyDelete extends Component
{
    public $open = false;
    public $policyId;

    public function deleteConfirmed()
    {
        $insurancePolicy = InsurancePolicy::find($this->policyId);

        $insurancePolicy->delete();
        $this->emitTo('policies.insurance-policies', 'render');
        $this->emit('alert', '¡Póliza Eliminada!');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.policies.insurance-policy-delete');
    }
}
