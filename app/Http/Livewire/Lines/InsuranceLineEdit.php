<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineEdit extends Component
{
    use WithFileUploads;

    public $insuranceCompanies;
    public $lineId;
    public $insuranceLine;

    public $insuranceCompanyId, $name, $description, $is_active, $image;
    public $open = false;

    protected $rules = [
        'insuranceCompanyId'  => 'required|exists:insurance_companies,id',
        'name'               => 'required|max:50',
        'description'        => 'required',
        'is_active'          => 'required|boolean',
        'image'              => 'nullable|image|max:2048',
    ];


    public function mount()
    {
        $this->insuranceCompanies = InsuranceCompany::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($lineId)
    {
        $this->insuranceLine = InsuranceLine::find($lineId);

        $this->lineId = $lineId;
        $this->insuranceCompanyId = $this->insuranceLine->insurance_company_id;
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
            'insurance_company_id' => $this->insuranceCompanyId,
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
            'insuranceCompanyId',
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
