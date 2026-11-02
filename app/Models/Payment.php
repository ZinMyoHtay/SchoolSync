<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'student_fee_id',
        'amount_paid',
        'payment_date',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'payment_date' => 'date',
    ];

    public function studentFee()
    {
        return $this->belongsTo(
            StudentFee::class,
            'student_fee_id',
            'student_fee_id'
        );
    }
}