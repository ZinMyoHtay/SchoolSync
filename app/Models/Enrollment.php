<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $primaryKey = 'enrollment_id';

    protected $fillable = [
        'student_id',
        'class_id',
        'enrollment_date',
        'status',
    ];

    protected $casts = [
        'enrollment_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'student_id'
        );
    }

    public function classroom()
    {
        return $this->belongsTo(
            Classroom::class,
            'class_id',
            'class_id'
        );
    }

    public function attendances()
    {
        return $this->hasMany(
            Attendance::class,
            'enrollment_id',
            'enrollment_id'
        );
    }

    public function latestAttendance()
    {
        return $this->hasOne(
            Attendance::class,
            'enrollment_id',
            'enrollment_id'
        )->latestOfMany('attendance_date');
    }
}