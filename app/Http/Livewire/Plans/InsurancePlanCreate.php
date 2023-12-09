<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePlanCreate extends Component
{
    use WithFileUploads;

    public $lines;
    public $line_id;
    public $name, $description, $coverage, $price, $is_active, $image;
    public $open = false;

    protected $rules = [
        'line_id' => 'required|exists:insurance_lines,id',
        'name' => 'required|max:50',
        'description' => 'required',
        'coverage' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'is_active' => 'required',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount(InsuranceLine $lineModel)
    {
        $this->lines = $lineModel->all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();

        if ($this->image) {
            $image_url = $this->image->store('plans');
        } else {
            $image_url = null;
        }

        InsurancePlan::create([
            'line_id' => $this->line_id,
            'name' => $this->name,
            'description' => $this->description,
            'coverage' => $this->coverage,
            'price' => $this->price,
            'is_active' => $this->is_active,
            'image' => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('plans.insurance-plans', 'render');
        $this->emit('alert', '¡Plan de Seguro Creado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'line_id',
            'name',
            'description',
            'coverage',
            'price',
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-create');
    }
}
