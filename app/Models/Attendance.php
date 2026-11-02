<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $primaryKey = 'attendance_id';

    protected $fillable = [
        'enrollment_id',
        'attendance_date',
        'attendance_grade',
        'status',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    public function enrollment()
    {
        return $this->belongsTo(
            Enrollment::class,
            'enrollment_id',
            'enrollment_id'
        );
    }
}