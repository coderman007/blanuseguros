<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineCreate extends Component
{
    use WithFileUploads;

    public $insuranceCompanies;
    public $insuranceCompanyId;
    public $name, $description, $is_active, $image;
    public $open = false;

    protected $rules = [
        'insuranceCompanyId' => 'required|exists:insurance_companies,id',
        'name' => 'required|max:50',
        'description' => 'required',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->insuranceCompanies = InsuranceCompany::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        $image_url = $this->image ? $this->image->store('lines') : null;

        $slug = Str::slug($this->name);

        InsuranceLine::create([
            'insurance_company_id' => $this->insuranceCompanyId,
            'name' => $this->name,
            'slug' => $slug,
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
