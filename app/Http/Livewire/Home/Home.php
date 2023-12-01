<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\InsuranceLine;

class Home extends Component
{

    public $lines;
    public function mount()
    {
        $this->lines = InsuranceLine::all();
    }
    public function render()
    {
        return view('livewire.home.home');
    }
}
