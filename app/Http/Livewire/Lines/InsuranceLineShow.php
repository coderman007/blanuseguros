<?php

namespace App\Http\Livewire\Lines;

use Livewire\Component;
use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;

class InsuranceLineShow extends Component
{
    public $open = false;
    public $company;
    public $line;

    public function mount(InsuranceLine $line)
    {
        $this->line = $line;
        $this->company = $line->insuranceCompany::get(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-show', [
            'company' => $this->company,
            'line' => $this->line,
        ]);
    }
}
