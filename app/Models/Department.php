<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_code',
        'department_name',
        'description',
        'status'
    ];

    // Department has many Positions
    public function positions()
    {
        return $this->hasMany(Position::class, 'department_id', 'department_id');
    }

    // Department has many Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id');
    }
}