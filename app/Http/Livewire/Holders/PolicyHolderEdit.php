<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class PolicyHolderEdit extends Component
{
    use WithFileUploads;
    public $holderId;
    public $holder;
    public $open_edit = false;

    public $document;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $is_active;
    public $image;

    public function rules()
    {
        return [
            'document' => 'required|unique:policy_holders,document,' . $this->holderId,
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'is_active' => 'required|boolean',
            'image'  => 'nullable|image|max:2048',
        ];
    }

    public function mount($holderId)
    {
        $this->holderId = $holderId;
        $this->holder = PolicyHolder::findOrFail($holderId);
        $this->document = $this->holder->document;
        $this->first_name = $this->holder->first_name;
        $this->last_name = $this->holder->last_name;
        $this->address = $this->holder->address;
        $this->phone = $this->holder->phone;
        $this->email = $this->holder->email;
        $this->is_active = $this->holder->is_active;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        try {
            $this->validate();

            $this->holder->update([
                'document' => $this->document,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'is_active' => $this->is_active,
            ]);
            if ($this->image) {
                $image_url = $this->image->store('users');
                $this->holder->update(['image' => $image_url]);
            }
            $this->emitTo('holders.policy-holders', 'render');
            $this->emit('alert', '¡Tomador de Póliza Editado Exitosamente!');
            $this->open_edit = false;
        } catch (\Exception $e) {
            $this->emit('error', 'Error al actualizar el titular de la póliza!' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.holders.policy-holder-edit');
    }
}
