<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $primaryKey = 'staff_id';

    protected $fillable = [
        'user_id',
        'dept_id',
        'staff_code',
        'full_name',
        'phone',
        'address',
        'hire_date',
        'position',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'dept_id',
            'department_id'
        );
    }

    public function teacher()
    {
        return $this->hasOne(
            Teacher::class,
            'staff_id',
            'staff_id'
        );
    }
}

