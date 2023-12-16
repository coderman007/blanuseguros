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
    public $companies;
    public $perPage = 10;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;

    protected $listeners = ['render'];

    public function mount(InsuranceCompany $companyModel)
    {
        $this->companies = $companyModel->all();
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
            $query->where('id', $this->search)
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        $insuranceLines = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.lines.insurance-lines', compact('insuranceLines'));
    }
}
