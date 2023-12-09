<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'address',
        'phone',
        'email',
    ];

    public function insurancePolicies()
    {
        return $this->hasMany(InsurancePolicy::class);
    }

    public function insuranceLines()
    {
        return $this->hasMany(InsuranceLine::class);
    }
}
