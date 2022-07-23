<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    const TEACHERS = [
        1 => 'Katie', 
        2 => 'Max',
    ];
    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id',
    ];
}
