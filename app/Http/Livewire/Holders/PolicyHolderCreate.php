<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithFileUploads;

class PolicyHolderCreate extends Component
{
    use WithFileUploads;
    public $document;
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $is_active;
    public $image;
    public $open_create = false;

    protected $rules = [
        'document' => 'required|unique:policy_holders,document',
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:policy_holders,email',
        'is_active' => 'required|boolean',
        'image'  => 'nullable|image|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        try {

            if ($this->image) {
                $image_url = $this->image->store('holders');
            } else {
                $image_url = null;
            }

            PolicyHolder::create([
                'document' => $this->document,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'is_active' => $this->is_active,
                'image' => $image_url,
            ]);

            $this->resetForm();
            $this->emitTo('holders.policy-holders', 'render');
            $this->emit('alert', '¡Titular de Póliza Creado Exitosamente!');
        } catch (\Exception $e) {
            $this->emit('error', 'Error al crear el titular' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'open_create',
            'document',
            'first_name',
            'last_name',
            'address',
            'phone',
            'email',
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.holders.policy-holder-create');
    }
}
