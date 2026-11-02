<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'subject_id';

    protected $fillable = [
        'subject_code',
        'subject_name',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Class Subjects
    |--------------------------------------------------------------------------
    */

    public function classSubjects()
    {
        return $this->hasMany(
            ClassSubject::class,
            'subject_id',
            'subject_id'
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
            'subject_id',
            'subject_id'
        );
    }
}