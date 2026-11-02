<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'staff_id',
        'teacher_code',
        'specialization',
    ];

    /*
    |--------------------------------------------------------------------------
    | Staff
    |--------------------------------------------------------------------------
    */

    public function staff()
    {
        return $this->belongsTo(
            Staff::class,
            'staff_id',
            'staff_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Class Subjects
    |--------------------------------------------------------------------------
    |
    | A teacher can teach many subject assignments.
    |
    */

    public function classSubjects()
    {
        return $this->hasMany(
            ClassSubject::class,
            'teacher_id',
            'teacher_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Schedules
    |--------------------------------------------------------------------------
    */

    public function schedules()
    {
        return $this->hasMany(
            Schedule::class,
            'teacher_id',
            'teacher_id'
        );
    }

//// new update fix /////
    public function classrooms()
    {
        return $this->belongsToMany(
            Classroom::class,
            'class_subjects',
            'teacher_id',
            'class_id',
            'teacher_id',
            'class_id'
        )->distinct();
    }
}
