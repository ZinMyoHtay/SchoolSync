<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeType extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'fee_type_id';

    protected $fillable = [
        'fee_name',
        'default_amount',
        'status',
    ];

    protected $casts = [
        'default_amount' => 'decimal:2',
        'deleted_at' => 'datetime',
    ];

    public function studentFees()
    {
        return $this->hasMany(
            StudentFee::class,
            'fee_type_id',
            'fee_type_id'
        );
    }
}