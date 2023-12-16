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

    public function mount()
    {
        $this->lines = InsuranceLine::all();
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
        $this->emit('alert', '¡Plan Creado Exitosamente!');
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
        return view('livewire.plans.insurance-plan-create');
    }
}
