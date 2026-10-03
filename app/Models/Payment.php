<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'member_id',
        'payment_date',
        'amount',
        'payment_method',
        'payment_type',
        'receipt_number',
        'bank_name',
        'payment_status',
        'transaction_reference',
        'renewal_checked_at',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(
            Member::class,
            'member_id',
            'member_id'
        );
    }
}
