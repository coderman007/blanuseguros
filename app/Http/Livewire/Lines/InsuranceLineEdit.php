<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceLine;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineEdit extends Component
{
    use WithFileUploads;

    public $lineId;
    public $insuranceLine;
    public $name, $description, $is_active, $image;
    public $open_edit = false;

    protected $rules = [
        'name' => 'required|max:50',
        'description' => 'required',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount($lineId)
    {
        $this->lineId = $lineId;
        $this->insuranceLine = InsuranceLine::find($lineId);
        $this->name = $this->insuranceLine->name;
        $this->description = $this->insuranceLine->description;
        $this->is_active = $this->insuranceLine->is_active;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();
        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('plans');

            // Eliminar la imagen antigua si existe
            if ($this->insuranceLine->image) {
                Storage::delete($this->insuranceLine->image);
            }

            $this->insuranceLine->update(['image' => $image_url]);
        }
        // $image_url = $this->image ? $this->image->store('lines') : $this->insuranceLine->image;

        $this->insuranceLine->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'image' => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('lines.insurance-lines', 'render');
        $this->emit('alert', '¡Ramo Actualizado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open_edit',
            'name',
            'description',
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-edit');
    }
}
