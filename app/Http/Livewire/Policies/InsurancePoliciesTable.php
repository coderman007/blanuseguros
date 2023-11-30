<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsurancePlan;
use App\Models\Line;
use App\Models\InsurancePolicy;
use Livewire\Component;
use Livewire\WithPagination;

class InsurancePoliciesTable extends Component
{
    use WithPagination;

    public $search;
    public $lines;
    public $plans;
    public $perPage = 10;
    public $lineFilter;
    public $planFilter;
    public $sort = "id";
    public $direction = "asc";
    public $open = false;

    protected $listeners = ['render'];

    public function mount(Line $lineModel, InsurancePlan $planModel)
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
        $query = InsurancePolicy::query();

        if ($this->search) {
            $query->where('policy_number', 'like', '%' . $this->search . '%')
                ->orWhere('start_date', 'like', '%' . $this->search . '%')
                ->orWhere('end_date', 'like', '%' . $this->search . '%');
        }

        if ($this->lineFilter) {
            $query->whereHas('line', function ($q) {
                $q->where('name', $this->lineFilter);
            });
        }

        if ($this->planFilter) {
            $query->whereHas('insurancePlan', function ($q) {
                $q->where('title', $this->planFilter);
            });
        }

        $policies = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.policies.insurance-policies-table', [
            'policies' => $policies,
        ]);
    }
}
