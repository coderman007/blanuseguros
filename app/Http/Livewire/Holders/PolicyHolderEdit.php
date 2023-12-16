<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;

class InsuranceHolderEdit extends Component
{
    public $holderId;
    public $holder;
    public $open = false;

    public $document;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;

    public function mount()
    {
        $this->holder = PolicyHolder::find($this->holderId);

        $this->document = $this->holder->document;
        $this->first_name = $this->holder->first_name;
        $this->last_name = $this->holder->last_name;
        $this->address = $this->holder->address;
        $this->phone = $this->holder->phone;
        $this->email = $this->holder->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'document' => 'required|unique:policy_holders,document,' . $this->holderId,
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:policy_holders,email,' . $this->holderId,
        ];
    }

    public function updateHolder()
    {
        $this->validate();

        $this->holder->update([
            'document' => $this->document,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->emitTo('holders.insurance-holders', 'render');
        $this->emit('alert', '¡Tomador de Póliza Editado Exitosamente!');
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.holders.insurance-holder-edit');
    }
}
