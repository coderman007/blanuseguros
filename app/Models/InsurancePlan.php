<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'coverage',
        'effective_period', // vigencia del plan
        'price',
        'active',
    ];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function insurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }
}
