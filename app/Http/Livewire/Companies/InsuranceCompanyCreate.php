<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use Livewire\Component;

class InsuranceCompanyCreate extends Component
{
    public $name;
    public $url;
    public $address;
    public $phone;
    public $email;
    public $open = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'url' => 'nullable|url|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addCompany()
    {
        $this->validate();

        InsuranceCompany::create([
            'name' => $this->name,
            'url' => $this->url,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->resetForm();
        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía de Seguros Creada Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'name',
            'url',
            'address',
            'phone',
            'email',
        ]);
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-create');
    }
}
