<?php

namespace App\Http\Livewire\Policies;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use App\Models\PolicyHolder;
use App\Models\InsurancePolicy;
use Livewire\Component;
use Livewire\WithPagination;

class InsurancePolicies extends Component
{
    use WithPagination;

    public $search;
    public $companies;
    public $lines;
    public $holders;
    public $perPage = 10;
    public $sort = 'id';
    public $direction = 'asc';
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceCompany $companyModel, InsuranceLine $lineModel, PolicyHolder $holderModel)
    {
        $this->companies = $companyModel->get(['id', 'name']);
        $this->lines = $lineModel->get(['id', 'name']);
        $this->holders = $holderModel->get(['id', 'first_name', 'last_name']);
    }

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
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
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

        $policies = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.policies.insurance-policies', compact('policies'));
    }
}
