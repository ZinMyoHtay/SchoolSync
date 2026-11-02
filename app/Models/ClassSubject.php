<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $primaryKey = 'class_subject_id';

    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

  

    public function getTotalDaysAttribute()
    {
        if (!$this->start_date || !$this->end_date) {
            return 0;
        }

        return $this->start_date->diffInDays($this->end_date) + 1;
    }



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