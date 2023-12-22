<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;

class InsuranceCompanyShow extends Component
{
    public $open = false;
    public $company;

    public function mount(InsuranceCompany $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-show');
    }
}
