<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'companyId',
        'name',
        'description',
        'launch_date',
        'phone',
        'email',
        'address',
    ];

    public function getLaunchDateAttribute($value){
        return $this->attributes['launch_date'] = getFormatedDate($value);
    }
}
