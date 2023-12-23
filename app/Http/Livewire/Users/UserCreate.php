<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    use WithFileUploads;

    public $open_create = false;
    public $user, $document, $name, $email, $address, $phone, $password, $is_active, $profile_photo_path, $selectedRole;

    protected $rules = [
        'document'            => 'nullable',
        'name'                => 'required|max:50',
        'email'               => 'required|email',
        'address'             => 'nullable',
        'phone'               => 'nullable',
        'password'            => 'required',
        'is_active'           => 'required|boolean',
        'profile_photo_path'  => 'nullable|image|max:2048',
    ];

    public function create_user()
    {

        $this->validate();

        if ($this->profile_photo_path) {
            $image_url = $this->profile_photo_path->store('users');
        } else {
            $image_url = null;
        }

        $newUser = User::create([
            'document'            => $this->document,
            'name'                => $this->name,
            'email'               => $this->email,
            'address'             => $this->address,
            'phone'               => $this->phone,
            'password'            => Hash::make($this->password),
            'is_active'           => $this->is_active,
            'profile_photo_path'  => $image_url,

        ]);

        $newUser->assignRole($this->selectedRole);

        $this->reset('document', 'name', 'email', 'address', 'phone', 'password', 'is_active', 'profile_photo_path');
        $this->open_create = false;
        $this->emitTo('users.users', 'render');
        $this->emit('alert', '¡Usuario Creado Exitosamente!');
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.user-create', ['roles' => $roles]);
    }
}
