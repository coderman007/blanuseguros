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
        $this->line = $line->load('company:id,name'); // Cargar la relación con la compañía
        $this->company = $this->line->company; // Acceder a la compañía a través de la relación
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-show', [
            'company' => $this->company,
            'line' => $this->line,
        ]);
    }
}
