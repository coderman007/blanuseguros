<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;

class InsuranceHolderShow extends Component
{
    public $open = false;
    public $holder;

    public function mount(PolicyHolder $holder)
    {
        $this->holder = $holder;
    }

    public function render()
    {
        return view('livewire.holders.insurance-holder-show');
    }
}
