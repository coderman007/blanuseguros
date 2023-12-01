<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceLine extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'image',
        'is_active',
    ];

    public function InsurancePlans()
    {
        return $this->hasMany(InsurancePlan::class);
    }

    public function InsurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }
}
