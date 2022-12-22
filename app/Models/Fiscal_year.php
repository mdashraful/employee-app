<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal_year extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function getStartDateAttribute($value){
        return $this->attributes['start_date'] = getFormatedDate($value);
    }

    public function getEndDateAttribute($value){
        return $this->attributes['end_date'] = getFormatedDate($value);
    }
}
