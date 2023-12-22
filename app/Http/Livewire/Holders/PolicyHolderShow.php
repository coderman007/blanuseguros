<?php

namespace App\Http\Livewire\Holders;

use Livewire\Component;
use App\Models\PolicyHolder;

class PolicyHolderShow extends Component
{
    public $holder;
    public $open_show = false;

    public function mount(PolicyHolder $holder)
    {
        $this->holder = $holder;
    }

    public function render()
    {
        return view('livewire.holders.policy-holder-show');
    }
}