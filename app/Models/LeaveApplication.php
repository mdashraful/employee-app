<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
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
        return $this->belongsTo(FiscalYear::class, 'fiscal_year');
    }

    public function leaveCategory()
    {
        return $this->belongsTO(LeaveCategory::class, 'leave_category');
    }
}
