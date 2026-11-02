<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parents';

    protected $primaryKey = 'parent_id';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'address',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'parent_student',
            'parent_id',
            'student_id'
        )
        ->withPivot('relationship', 'is_primary')
        ->withTimestamps();
    }
}
