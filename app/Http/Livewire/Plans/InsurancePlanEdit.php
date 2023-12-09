<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePlanEdit extends Component
{
    use WithFileUploads;

    public $planId;
    public $plan;
    public $lines;

    public $line_id, $name, $description, $coverage, $price, $is_active, $image;
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

    public function mount()
    {
        $this->plan = InsurancePlan::find($this->planId);
        $this->lines = InsuranceLine::all();

        $this->line_id = $this->plan->line_id;
        $this->name = $this->plan->name;
        $this->description = $this->plan->description;
        $this->coverage = $this->plan->coverage;
        $this->price = $this->plan->price;
        $this->is_active = $this->plan->is_active;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatePlan()
    {
        $this->validate();

        $this->plan->line_id = $this->line_id;
        $this->plan->name = $this->name;
        $this->plan->description = $this->description;
        $this->plan->coverage = $this->coverage;
        $this->plan->price = $this->price;
        $this->plan->is_active = $this->is_active;

        if ($this->image) {
            $image_url = $this->image->store('plans');
            $this->plan->image = $image_url;
        }

        $this->plan->save();

        $this->emitTo('plans.insurance-plans', 'render');
        $this->emit('alert', '¡Plan de Seguro Editado Exitosamente!');
    }

    public function render()
    {
        return view('livewire.plans.insurance-plan-edit', [
            'lines' => $this->lines,
        ]);
    }
}
