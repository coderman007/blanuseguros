<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;

class InsuranceCompanyDelete extends Component
{
    public $open = false;
    public $companyId;

    public function deleteConfirmed()
    {
        $insuranceCompany = InsuranceCompany::find($this->companyId);

        $insuranceCompany->delete();
        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía de Seguros Eliminada!');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-delete');
    }
}
