<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;

class InsuranceHolderDelete extends Component
{
    public $open = false;
    public $holderId;

    public function deleteConfirmed()
    {
        $holder = PolicyHolder::find($this->holderId);

        if ($holder) {
            $holder->delete();
            $this->emitTo('holders.insurance-holders', 'render');
            $this->emit('alert', '¡Tomador de Póliza Eliminado!');
            $this->open = false;
        }
    }

    public function render()
    {
        return view('livewire.holders.insurance-holder-delete');
    }
}
