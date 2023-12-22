<?php

namespace App\Http\Livewire\Plans;

use App\Models\InsuranceLine;
use App\Models\InsurancePlan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsurancePlanEdit extends Component
{
    use WithFileUploads;

    public $plan;
    public $lines;
    public $lineId, $name, $description, $price, $coverage, $is_active, $image;
    public $open = false;

    protected $rules = [
        'lineId' => 'required|exists:insurance_lines,id',
        'name' => 'required|string|min:5|max:255',
        'description' => 'nullable|min:5|string|max:255',
        'coverage' => 'required|string|min:5|max:255',
        'price' => 'required|numeric|min:0',
        'is_active' => 'required|boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount(InsurancePlan $plan)
    {
        $this->plan = $plan;
        $this->lines = InsuranceLine::all();

        // Set the initial values for editing
        $this->lineId = $plan->insurance_line_id;
        $this->name = $plan->name;
        $this->description = $plan->description;
        $this->coverage = $plan->coverage;
        $this->price = $plan->price;
        $this->is_active = $plan->is_active;
        // Note: You may need to handle the image separately based on your application logic
        // For example, you may want to show the current image and allow the user to upload a new one.
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            // Actualizar la imagen si se ha cargado una nueva
            $image_url = $this->image->store('plans');

            // Eliminar la imagen antigua si existe y es diferente de la imagen por defecto
            if ($this->user->image) {
                Storage::delete($this->user->image);
            }

            $this->user->update(['image' => $image_url]);
        }

        $this->plan->update([
            'insurance_line_id' => $this->lineId,
            'name'              => $this->name,
            'description'       => $this->description,
            'coverage'          => $this->coverage,
            'price'             => $this->price,
            'is_active'         => $this->is_active,
            'image'             => $image_url,
        ]);

        $this->resetForm();
        $this->emitTo('plans.insurance-plans', 'render');
        $this->emit('alert', '¡Plan Actualizado Exitosamente!');
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'lineId',
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
