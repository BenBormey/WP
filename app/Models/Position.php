<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $primaryKey = 'position_id';

    protected $fillable = [
        'position_title',
        'description',
        'level',
        'department_id',
        'is_managerial'
    ];

    // Position belongs to Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    // Position has many Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'position_id');
    }
}
