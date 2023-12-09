<?php

namespace App\Http\Livewire\companies;

use App\Models\InsuranceCompany;
use Livewire\Component;
use Livewire\WithPagination;

class InsuranceCompanies extends Component
{
    use WithPagination;

    public $search;
    public $companies;
    public $perPage = 10;
    public $sort = "id";
    public $direction = "asc";
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

    public function resetSearch()
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
        $query = InsuranceCompany::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('url', 'like', '%' . $this->search . '%');
        }

        $companies = $query->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        return view('livewire.companies.insurance-companies', [
            'companies' => $companies,
        ]);
    }
}
