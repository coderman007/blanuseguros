<?php

namespace App\Http\Livewire\lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineCreate extends Component
{
    use WithFileUploads;

    public $insurance_companies;
    public $insurance_company_id;
    public $name, $description, $is_active, $image;
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

    public function add()
    {
        $this->validate();

        if ($this->image) {
            $image_url = $this->image->store('lines');
        } else {
            $image_url = null;
        }
        InsuranceLine::create([
            'insurance_company_id' => $this->insurance_company_id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'image' => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('lines.insurance-lines', 'render');
        $this->emit('alert', '¡Ramo Creado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'insurance_company_id',
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
