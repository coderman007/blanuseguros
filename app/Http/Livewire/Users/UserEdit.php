<?php

namespace App\Http\Livewire\Users;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class UserEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $document, $name, $email, $password, $slug, $address, $phone, $is_active, $profile_photo_path;
    public $open_edit = false;

    protected $rules = [
        'document'           => 'nullable',
        'name'               => 'required|max:50',
        'email'              => 'required|email',
        'password'           => 'nullable|min:8',
        'address'            => 'nullable',
        'phone'              => 'nullable',
        'is_active'          => 'nullable',
        'profile_photo_path' => 'nullable|image|max:2048',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->document = $user->document;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->slug = $user->slug;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->is_active = $user->is_active;
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }
    public function update()
    {
        $this->validate();

        // Actualizar el usuario en la base de datos
        $userData = [
            'document' => $this->document,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'slug' => $this->slug,
            'address' => $this->address,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
        ];

        if ($this->password) {
            $userData['password'] = Hash::make($this->password);
        }

        $this->user->update($userData);

        if ($this->profile_photo_path) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->profile_photo_path->store('users');
            $this->user->update(['profile_photo_path' => $image_url]);
        }

        $this->open_edit = false;
        $this->emitTo('users.users', 'render');
        $this->emit('alert', '¡Usuario Actualizado Exitosamente!');
    }


    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
