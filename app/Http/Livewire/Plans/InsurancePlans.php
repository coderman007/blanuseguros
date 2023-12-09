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
    public $plans;
    public $lines;
    public $perPage = 10;
    public $lineFilter;
    public $sort = "id";
    public $direction = "asc";
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceLine $lineModel, InsurancePlan $planModel)
    {
        $this->lines = $lineModel->all();
        $this->plans = $planModel->all();
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
        $query = InsurancePlan::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        if ($this->lineFilter) {
            $query->whereHas('line', function ($q) {
                $q->where('name', $this->lineFilter);
            });
        }

        $plans = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.plans.insurance-plans', [
            'plans' => $plans,
        ]);
    }
}