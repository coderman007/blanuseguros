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
        'vehicle_plate',
        'contract_number',
        'start_date',
        'end_date',
        'net_premium',
        'expenditures',
        'value_added_tax',
        'total_value',
        'payment_date',
        'payment_method',
        'is_active',
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
