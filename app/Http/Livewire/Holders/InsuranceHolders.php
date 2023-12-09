<?php

namespace App\Http\Livewire\Holders;

use App\Models\PolicyHolder;
use Livewire\Component;
use Livewire\WithPagination;

class InsuranceHolders extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    public $sort = "id";
    public $direction = "asc";
    public $open = false;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
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

    public function render()
    {
        $query = PolicyHolder::query();

        if ($this->search) {
            $query->where('document', 'like', '%' . $this->search . '%')
                ->orWhere('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }

        $holders = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.holders.insurance-holders', [
            'holders' => $holders,
        ]);
    }
}
