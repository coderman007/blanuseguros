<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'image',
    ];

    public function insurancePlans()
    {
        return $this->hasMany(InsurancePlan::class);
    }

    public function insurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }
}
