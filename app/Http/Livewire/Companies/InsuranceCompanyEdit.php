<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;

class InsuranceCompanyEdit extends Component
{
    public $companyId;
    public $company;
    public $open = false;

    protected $rules = [
        'company.name' => 'required|string|max:255',
        'company.url' => 'nullable|url|max:255',
        'company.address' => 'nullable|string|max:255',
        'company.phone' => 'nullable|string|max:20',
        'company.email' => 'nullable|email|max:255',
    ];

    public function mount($companyId)
    {
        $this->companyId = $companyId;
        $this->company = InsuranceCompany::findOrFail($companyId)->toArray();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateCompany()
    {
        $this->validate();

        InsuranceCompany::find($this->companyId)->update($this->company);

        $this->resetForm();
        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía de Seguros Editada Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'company',
        ]);
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-edit');
    }
}
