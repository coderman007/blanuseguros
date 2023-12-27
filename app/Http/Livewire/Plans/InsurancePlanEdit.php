<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePlanEdit extends Component
{
    use WithFileUploads;

    public $planId, $plan, $lines;
    public $name, $description, $coverage, $price, $is_active, $image;
    public $open_edit = false;

    protected $rules = [
        'plan.insurance_line_id'    => 'required|exists:insurance_lines,id',
        'name'                      => 'required|string|min:5|max:255',
        'description'               => 'nullable|min:5|string|max:255',
        'coverage'                  => 'required|string|min:5|max:255',
        'price'                     => 'required|numeric|min:0',
        'is_active'                 => 'required|boolean',
        'image'                     => 'nullable|image|max:2048',
    ];

    public function mount($planId)
    {
        $this->planId = $planId;
        $this->plan = insurancePlan::find($planId);
        $this->lines = InsuranceLine::get(['id', 'name']);
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

    public function update()
    {
        $this->validate();
        try {
            $data = [
                'insurance_line_id'  => $this->plan->insurance_line_id,
                'name'                  => $this->name,
                'description'           => $this->description,
                'coverage'          => $this->coverage,
                'price'             => $this->price,
                'is_active'             => $this->is_active,
            ];
            if ($this->image) {
                $data['image'] = $this->image->store('plans');
            }

            $this->plan->update($data);
            $this->open_edit = false;
            $this->resetForm();
            $this->emitTo('plans.insurance-plans', 'render');
            $this->emit('alert', '¡Plan Actualizado Exitosamente!');
        } catch (\Exception $e) {
            $this->emit('error', 'Error al actualizar el plan: ' . $e->getMessage());
        }
    }
    private function resetForm()
    {
        $this->reset([
            'open_edit',
            'planId',
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
        return view('livewire.plans.insurance-plan-edit');
    }
}
