<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsurancePlan;
use App\Models\InsuranceLine;
use App\Models\InsurancePolicy;
use Livewire\Component;
use Livewire\WithPagination;

class InsurancePolicies extends Component
{
    use WithPagination;

    public $search;
    public $lines;
    public $plans;
    public $perPage = 10;
    public $lineFilter;
    public $planFilter;
    public $sort = 'id';
    public $direction = 'asc';
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

    public function updatedPlanFilter()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->lineFilter = '';
        $this->planFilter = '';
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
        $query = InsurancePolicy::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('policy_number', 'like', '%' . $this->search . '%')
                    ->orWhere('start_date', 'like', '%' . $this->search . '%')
                    ->orWhere('end_date', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->lineFilter) {
            $query->whereHas('insuranceLine', function ($q) {
                $q->where('name', $this->lineFilter);
            });
        }

        if ($this->planFilter) {
            $query->whereHas('insuranceLine.insurancePlans', function ($q) {
                $q->where('name', $this->planFilter);
            });
        }

        $policies = $query->with(['insuranceLine.insurancePlans'])
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.policies.insurance-policies', compact('policies'));
    }
}
