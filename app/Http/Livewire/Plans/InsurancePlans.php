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
    public $lineFilter;
    public $sort = 'id';
    public $direction = 'asc';
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceLine $lineModel)
    {
        $this->lines = $lineModel->all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedLineFilter()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->lineFilter = '';
    }

    public function order($column)
    {
        if ($this->sort === $column) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $column;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        $query = InsurancePlan::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->lineFilter) {
            $query->whereHas('insuranceLine', function ($q) {
                $q->where('name', $this->lineFilter);
            });
        }

        $plans = $query->with(['insuranceLine'])
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.plans.insurance-plans', compact('plans'));
    }
}
