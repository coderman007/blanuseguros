<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceCompanyEdit extends Component
{
    use WithFileUploads;

    public $companyId;
    public $company;

    public $name, $url, $address, $phone, $email, $is_active, $image;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:255',
        'url' => 'nullable|max:255',
        'address' => 'nullable|max:255',
        'phone' => 'nullable|max:255',
        'email' => 'required|max:255|email',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->company = InsuranceCompany::find($this->companyId);

        $this->name = $this->company->name;
        $this->url = $this->company->url;
        $this->address = $this->company->address;
        $this->phone = $this->company->phone;
        $this->email = $this->company->email;
        $this->is_active = $this->company->is_active;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'url' => $this->url,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('companies');
        }

        $this->company->update($data);

        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía Editada Exitosamente!');
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-edit');
    }
}
