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
        $company = InsuranceCompany::find($this->companyId);

        $company->delete();
        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía Eliminada!');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-delete');
    }
}
