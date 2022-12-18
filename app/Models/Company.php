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
        'departments',
        'phone',
        'email',
        'address',
    ];

    public function setDepartmentsAttribute($value)
    {
        $this->attributes['departments'] = json_encode($value); 
    }

    public function getDepartmentsAttribute($value)
    {
        return $this->attributes['departments'] = json_decode($value); 
    }
}
