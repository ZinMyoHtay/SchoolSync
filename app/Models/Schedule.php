<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'schedule_date',
        'day_of_week',
        'start_time',
        'end_time',
        'room',
        'comment',
        'status',
    ];

    protected $casts = [
        'schedule_date' => 'date',
    ];

    public function classroom()
    {
        return $this->belongsTo(
            Classroom::class,
            'class_id',
            'class_id'
        );
    }

    public function subject()
    {
        return $this->belongsTo(
            Subject::class,
            'subject_id',
            'subject_id'
        );
    }

    public function teacher()
    {
        return $this->belongsTo(
            Teacher::class,
            'teacher_id',
            'teacher_id'
        );
    }
}
