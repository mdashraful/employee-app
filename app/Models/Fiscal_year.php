<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fiscal_year extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    // public function getStartDateAttribute($value){
    //     return $this->attributes['start_date'] = Carbon::parse($value)->format('d/m/Y');
    // }

    // public function getEndDateAttribute($value){
    //     return $this->attributes['end_date'] = Carbon::parse($value)->format('d/m/Y');
    // }
}
