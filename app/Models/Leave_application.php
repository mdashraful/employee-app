<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave_application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applied_by',
        'fiscal_year',
        'leave_category',
        'leave_from',
        'leave_to',
        'leave_applied_days',
        'details',
        'attachment',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function fiscalYear()
    {
        return $this->belongsTo(Fiscal_year::class, 'fiscal_year');
    }

    public function leaveCategory()
    {
        return $this->belongsTO(Leave_category::class, 'leave_category');
    }
}
