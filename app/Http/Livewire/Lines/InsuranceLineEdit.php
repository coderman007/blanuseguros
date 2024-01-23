<?php

namespace App\Http\Livewire\Lines;

use App\Models\InsuranceCompany;
use App\Models\InsuranceLine;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsuranceLineEdit extends Component
{
    use WithFileUploads;

    public $lineId, $line, $companies;
    public $name, $description, $is_active, $image;
    public $open_edit = false;

    protected $rules = [
        'line.insurance_company_id' => 'required|exists:insurance_companies,id',
        'name'                      => 'required|string|min:5|max:255',
        'description'               => 'nullable|min:5|string|max:255',
        'is_active'                 => 'required|boolean',
        'image'                     => 'nullable|image|max:2048',
    ];

    public function mount($lineId)
    {
        $this->lineId = $lineId;
        $this->line = insuranceLine::find($lineId);
        $this->companies = InsuranceCompany::get(['id', 'name']);
        $this->name = $this->line->name;
        $this->description = $this->line->description;
        $this->is_active = $this->line->is_active;
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
                'insurance_company_id'  => $this->line->insurance_company_id,
                'name'                  => $this->name,
                'description'           => $this->description,
                'is_active'             => $this->is_active,
            ];
            if ($this->image) {
                $data['image'] = $this->image->store('lines');
            }

            $this->line->update($data);
            $this->open_edit = false;
            $this->resetForm();
            $this->emitTo('lines.insurance-lines', 'render');
            $this->emit('alert', '¡Ramo Actualizado Exitosamente!');
        } catch (\Exception $e) {
            $this->emit('error', 'Error al actualizar el ramo: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'open_edit',
            'name',
            'description',
            'is_active',
            'image',
        ]);
    }

    public function render()
    {
        return view('livewire.lines.insurance-line-edit');
    }
}
