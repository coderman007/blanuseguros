<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'policy_holder_id',
        'document',
        'name',
        'email',
        'phone',
        'address',
        'slug',
        'is_active',
        'relationship',
        'image',
    ];

    public function policyHolder()
    {
        return $this->belongsTo(PolicyHolder::class);
    }
}
