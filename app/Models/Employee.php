<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'full_name',
        'gender',
        'dob',
        'national_id',
        'email',
        'phone_number',
        'address',
        'hire_date',
        'department_id',
        'position_id',
        'employee_type',
        'status',
        'profile_photo'
    ];

    // Employee belongs to Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    // Employee belongs to Position
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }
}