<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    protected $primaryKey = 'student_fee_id';

    protected $fillable = [
        'student_id',
        'fee_type_id',
        'academic_year_id',
        'net_amount',
        'status',
    ];

    protected $casts = [
        'net_amount' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'student_id'
        );
    }

    public function feeType()
    {
        return $this->belongsTo(
            FeeType::class,
            'fee_type_id',
            'fee_type_id'
        );
    }

    public function academicYear()
    {
        return $this->belongsTo(
            AcademicYear::class,
            'academic_year_id',
            'academic_year_id'
        );
    }

    public function payments()
    {
        return $this->hasMany(
            Payment::class,
            'student_fee_id',
            'student_fee_id'
        );
    }
}