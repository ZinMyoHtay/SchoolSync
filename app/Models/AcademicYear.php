<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $primaryKey = 'academic_year_id';

    protected $fillable = [
        'year_name',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function classrooms()
    {
        return $this->hasMany(
            Classroom::class,
            'year_id',
            'academic_year_id'
        );
    }
}