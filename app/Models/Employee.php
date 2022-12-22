<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "email",
        "company_id",
        "department_id",
        "designation_id",
        "join_date",
        "nid_no",
        "phone",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function getJoinDateAttribute($value)
    {
        return $this->attributes['join_date'] = getFormatedDate($value);
    }
}
