<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'days',
        'fiscal_year_id',
    ];
}
