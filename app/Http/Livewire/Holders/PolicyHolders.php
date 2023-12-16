<?php

namespace App\Http\Livewire\Holders;

use Livewire\Component;
use App\Models\PolicyHolder;
use Livewire\WithPagination;

class PolicyHolders extends Component
{
    use WithPagination;

    public $search, $holder;
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
        $query = PolicyHolder::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('document', 'like', '%' . $this->search . '%')
                ->orWhere('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%');
        }

        $holders = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.holders.policy-holders', compact('holders'));
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

    public function confirmDelete($holderId)
    {
        $this->holder = PolicyHolder::find($holderId);
        $this->open = true;
    }

    public function deleteConfirmed()
    {
        if ($this->holder) {
            $this->holder->delete();
            $this->emitTo('holders.policy-holders', 'render');
            $this->emit('alert', '¡Titular Eliminado!');
        }
        $this->open = false;
    }
}
