<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;

class InsuranceHolderCreate extends Component
{
    public $document;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $open = false;

    protected $rules = [
        'document' => 'required|unique:policy_holders,document',
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:policy_holders,email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addHolder()
    {
        $this->validate();

        PolicyHolder::create([
            'document' => $this->document,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->resetForm();
        $this->emitTo('holders.insurance-holders', 'render');
        $this->emit('alert', '¡Tomador de Póliza Creado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'document',
            'first_name',
            'last_name',
            'address',
            'phone',
            'email',
        ]);
    }

    public function render()
    {
        return view('livewire.holders.insurance-holder-create');
    }
}
