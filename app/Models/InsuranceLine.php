<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceLine extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'insurance_company_id',
        'name',
        'description',
        'image',
        'is_active',
    ];

    public function insurancePlans()
    {
        return $this->hasMany(InsurancePlan::class);
    }

    public function insurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }
}
