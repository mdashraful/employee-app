<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "designations",
    ];

    public function setDesignationsAttribute($value)
    {
        $this->attributes['designations'] = json_encode($value); 
    }

    public function getDesignationsAttribute($value)
    {
        return $this->attributes['designations'] = json_decode($value); 
    }
}