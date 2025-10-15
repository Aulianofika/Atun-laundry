<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'date',
        'weight',
        'rate_per_kg',
        'total_salary'
    ];

    protected $casts = [
        'date' => 'date', 
        'weight' => 'float',
        'rate_per_kg' => 'integer',
        'total_salary' => 'integer',
    ];
}
