<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithPagination;

class InsuranceLines extends Component
{
    use WithPagination;

    public $search;
    public $lines;
    public $companies;
    public $perPage = 10;
    public $companyFilter;
    public $sort = "id";
    public $direction = "asc";
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceLine $lineModel, InsuranceCompany $companyModel)
    {
        $this->lines = $lineModel->all();
        $this->companies = $companyModel->all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedCompanyFilter()
    {
        $this->resetPage();
    }



    public function resetFilters()
    {
        $this->search = '';
        $this->companyFilter = '';
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
        $query = InsuranceLine::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        if ($this->companyFilter) {
            $query->whereHas('company', function ($q) {
                $q->where('name', 'like', '%' . $this->companyFilter . '%');
            });
        }

        $lines = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.lines.insurance-lines', [
            'lines' => $lines,
        ]);
    }
}
