<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceCompanyCreate extends Component
{
    use WithFileUploads;

    public $name, $url, $email, $address, $phone, $is_active, $image;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:255',
        'url' => 'nullable|max:255',
        'email' => 'required|email|unique:insurance_companies,email',
        'address' => 'nullable|max:255',
        'phone' => 'nullable|max:255',
        'is_active' => 'required',
        'image' => 'nullable|image|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        if ($this->image) {
            $image_url = $this->image->store('companies');
        } else {
            $image_url = null;
        }

        InsuranceCompany::create([
            'name' => $this->name,
            'url' => $this->url,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'is_active' => $this->is_active,
            'image' => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('companies.insurance-companies', 'render');
        $this->emit('alert', '¡Compañía Creada Exitosamente!');
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
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-create');
    }
}
