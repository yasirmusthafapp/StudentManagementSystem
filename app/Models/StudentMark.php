<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    const TERMS = [
        1 => 'One', 
        2 => 'Two',
    ];
    protected $fillable = [
        'student_id',
        'term',
        'maths',
        'science',
        'history',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
