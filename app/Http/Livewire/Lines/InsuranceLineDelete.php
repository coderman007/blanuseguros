<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceLine;
use Livewire\Component;

class InsuranceLineDelete extends Component
{
    public $open = false;
    public $lineId;

    public function deleteConfirmed()
    {
        try {
            $insuranceline = InsuranceLine::findOrFail($this->lineId);
            $insuranceline->delete();

            $this->emitTo('lines.insurance-lines', 'render');
            $this->emit('alert', '¡Ramo Eliminado Exitosamente!');
            $this->open = false;
        } catch (\Exception $e) {
            $this->emit('alert', 'Error al eliminar el ramo.');
        }
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-delete');
    }
}
