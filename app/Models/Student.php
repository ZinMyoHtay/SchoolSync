<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'user_id',
        'student_code',
        'full_name',
        'date_of_birth',
        'phone',
        'address',
        'admission_date',
        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_address',
        'parent_relationship',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    public function enrollments()
    {
        return $this->hasMany(
            Enrollment::class,
            'student_id',
            'student_id'
        );
    }

    public function currentEnrollment()
    {
        return $this->hasOne(
            Enrollment::class,
            'student_id',
            'student_id'
        )->ofMany('enrollment_date', 'max');
    }

    public function studentFees()
    {
        return $this->hasMany(
            StudentFee::class,
            'student_id',
            'student_id'
        );
    }

    public function parents()
    {
        return $this->belongsToMany(
            ParentModel::class,
            'parent_student',
            'student_id',
            'parent_id'
        )
        ->withPivot('relationship', 'is_primary')
        ->withTimestamps();
    }
}
