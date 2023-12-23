<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_company_id',
        'insurance_line_id',
        'policy_holder_id',
        'policy_number',
        'start_date',
        'end_date',
        'payment_method',
        'payment_date',
        'value_added_tax',
        'net_premium',
        'total_value',
    ];

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function insuranceLine()
    {
        return $this->belongsTo(InsuranceLine::class);
    }

    public function policyHolder()
    {
        return $this->belongsTo(PolicyHolder::class);
    }
}
