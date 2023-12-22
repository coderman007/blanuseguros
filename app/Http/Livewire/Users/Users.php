<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search, $user;
    public $sort = "id";
    public $direction = "desc";
    public $perPage = 10;
    public $open = false;
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('document', 'like', '%' . $this->search . '%');
        }
        $users = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.users.users', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = ($this->direction == "desc") ? "asc" : "desc";
        } else {
            $this->sort = $sort;
            $this->direction = "asc";
        }
    }

    public function confirmDelete($userId)
    {
        $this->user = User::find($userId);
        $this->open = true;
    }

    public function deleteConfirmed()
    {
        if ($this->user) {
            $this->user->delete();
            $this->emitTo('users', 'render');
            $this->emit('alert', '¡Usuario Eliminado!');
        }
        $this->open = false;
    }
}
