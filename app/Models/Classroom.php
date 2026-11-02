<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $primaryKey = 'class_id';

    protected $fillable = [
        'year_id',
        'class_name',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Academic Year
    |--------------------------------------------------------------------------
    */

    public function academicYear()
    {
        return $this->belongsTo(
            AcademicYear::class,
            'year_id',
            'academic_year_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Class Subjects
    |--------------------------------------------------------------------------
    |
    | A classroom can have many subject-teacher assignments.
    |
    */

    public function classSubjects()
    {
        return $this->hasMany(
            ClassSubject::class,
            'class_id',
            'class_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Enrollments
    |--------------------------------------------------------------------------
    */

    public function enrollments()
    {
        return $this->hasMany(
            Enrollment::class,
            'class_id',
            'class_id'
        );
    }
}