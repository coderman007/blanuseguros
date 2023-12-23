<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class InsuranceCompanies extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    public $lineFilter;
    public $planFilter;
    public $sort = 'id';
    public $direction = 'asc';
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
        $query = InsuranceCompany::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        $companies = $query
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.companies.insurance-companies', compact('companies'));
    }
}
