<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'status',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class,'dept_id','department_id');
    }
}