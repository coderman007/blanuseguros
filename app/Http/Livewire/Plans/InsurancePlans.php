<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Livewire\Component;
use Livewire\WithPagination;

class InsurancePlans extends Component
{
    use WithPagination;

    public $search;
    public $lines;
    public $perPage = 10;
    public $sort = 'id';
    public $direction = 'asc';
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceLine $lineModel)
    {
        $this->lines = $lineModel->get();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedLineFilter()
    {
        $this->search = '';
    }

    public function order($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        $query = InsurancePlan::query();

        if ($this->search) {
            $query->where('id', $this->search)
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('price', $this->search);
        }

        $plans = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.plans.insurance-plans', compact('plans'));
    }
}
