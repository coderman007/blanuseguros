<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\InsuranceCompany;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class InsuranceCompanyEdit extends Component
{
    use WithFileUploads;

    public $company;
    public $name, $url, $address, $phone, $email, $is_active, $image;
    public $open_edit = false;

    protected $rules = [
        'name'      => 'required|string|max:255',
        'url'       => 'nullable|url|max:255',
        'address'   => 'nullable|string|max:255',
        'phone'     => 'nullable|string|max:20',
        'email'     => 'required|email|max:255',
        'is_active' => 'nullable|boolean',
        'image'     => 'nullable|image|max:2048',
    ];

    public function mount(InsuranceCompany $company)
    {
        $this->company      = $company;
        $this->name         = $company->name;
        $this->url          = $company->url;
        $this->address      = $company->address;
        $this->phone        = $company->phone;
        $this->email        = $company->email;
        $this->is_active    = $company->is_active;
        $this->image        = $company->image;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->company->update([
            'name'      => $this->name,
            'url'       => $this->url,
            'address'   => $this->address,
            'phone'     => $this->name,
            'email'     => $this->email,
            'is_active' => $this->is_active,
        ]);

        if ($this->image) {
            $image_url = $this->image->store('companies');
            $this->company->update(['profile_photo_path' => $image_url]);
        }

        $this->open_edit = false;

        $this->emitTo('companies.insurance-companies', 'render');

        $this->emit('alert', '¡Compañía Actualizada Exitosamente!');
    }

    public function render()
    {
        return view('livewire.companies.insurance-company-edit');
    }
}
