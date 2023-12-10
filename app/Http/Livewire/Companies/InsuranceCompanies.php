<?php

namespace App\Http\Livewire\Companies;

use App\Models\InsuranceCompany;
use Livewire\Component;
use Livewire\WithPagination;

class InsuranceCompanies extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    public $sort = "id";
    public $direction = "desc";
    public $open = false;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Restablecer propiedades de filtro de búsqueda.
    public function resetFilters()
    {
        $this->search = '';
    }

    public function render()
    {
        $query = InsuranceCompany::query();

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('url', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%');
        }

        $insuranceCompanies = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.companies.insurance-companies', compact('insuranceCompanies'));
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
}
