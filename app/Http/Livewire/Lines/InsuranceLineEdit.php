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
    public $insuranceLine;
    public $insuranceCompanyId;
    public $name, $description, $is_active, $image;
    public $open_edit = false;

    protected $rules = [
        'insuranceCompanyId' => 'required|exists:insurance_companies,id',
        'name' => 'required|max:50',
        'description' => 'required',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount(InsuranceLine $line)
    {
        $this->insuranceLine = $line;
        $this->insuranceCompanies = InsuranceCompany::all();
        $this->insuranceCompanyId = $line->insurance_company_id;
        $this->name = $line->name;
        $this->description = $line->description;
        $this->is_active = $line->is_active;
        $this->image = $line->image;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        $this->validate();

        // Lógica para la edición de la línea de seguro
        $this->insuranceLine->update([
            'insurance_company_id' => $this->insuranceCompanyId,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            // Otras actualizaciones necesarias
        ]);

        $this->resetForm();
        $this->emitTo('lines.insurance-lines', 'render');
        $this->emit('alert', '¡Ramo Editado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open_edit',
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