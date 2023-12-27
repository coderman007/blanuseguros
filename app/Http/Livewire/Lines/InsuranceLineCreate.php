<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineCreate extends Component
{
    use WithFileUploads;

    public $companies;
    public $insuranceCompanyId;
    public $name, $description, $is_active, $image, $unique_input_identifier;
    public $open_create = false;

    protected $rules = [
        'insuranceCompanyId' => 'required|exists:insurance_companies,id',
        'name' => 'required|max:50',
        'description' => 'required',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->companies = InsuranceCompany::get(['id', 'name']);
        $this->unique_input_identifier = rand();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();
        try {
            $image_url = $this->image ? $this->image->store('lines') : null;

            InsuranceLine::create([
                'insurance_company_id' => $this->insuranceCompanyId,
                'name' => $this->name,
                'description' => $this->description,
                'is_active' => $this->is_active,
                'image' => $image_url,
            ]);

            $this->resetForm();
            $this->emitTo('lines.insurance-lines', 'render');
            $this->emit('alert', '¡Ramo Creado Exitosamente!');
        } catch (\Exception $e) {
            $this->emit('error', 'Error al crear el ramo: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'open_create',
            'insuranceCompanyId',
            'name',
            'description',
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-create');
    }
}
