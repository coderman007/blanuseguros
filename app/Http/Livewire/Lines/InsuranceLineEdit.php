<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineEdit extends Component
{
    use WithFileUploads;

    public $insurance_companies;
    public $lineId;
    public $insuranceLine;

    public $insurance_company_id, $name, $description, $is_active, $image;
    public $open = false;

    protected $rules = [
        'insurance_company_id' => 'required|exists:insurance_companies,id',
        'name' => 'required|max:50',
        'description' => 'required',
        'is_active' => 'required',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->insurance_companies = InsuranceCompany::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($lineId)
    {
        $this->insuranceLine = InsuranceLine::find($lineId);

        $this->lineId = $lineId;
        $this->insurance_company_id = $this->insuranceLine->insurance_company_id;
        $this->name = $this->insuranceLine->name;
        $this->description = $this->insuranceLine->description;
        $this->is_active = $this->insuranceLine->is_active;
        $this->image = null; // Reiniciar la imagen al editar
        $this->open = true;
    }

    public function update()
    {
        $this->validate();

        $image_url = $this->image ? $this->image->store('lines') : $this->insuranceLine->image;

        $this->insuranceLine->update([
            'insurance_company_id' => $this->insurance_company_id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'image' => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('lines.insurance-lines', 'render');
        $this->emit('alert', '¡Ramo Editado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'lineId',
            'insurance_company_id',
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
