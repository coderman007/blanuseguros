<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UserShow extends Component
{
    public $user;
    public $open_show = false;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.user-show');
    }
}
