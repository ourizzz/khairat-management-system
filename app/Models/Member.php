<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'user_id',
        'full_name',
        'ic_number',
        'phone',
        'address',

        // Applicant details
        'birth_date',
        'email',

        // Heir details
        'heir_name',
        'heir_phone',

        // Registration details
        'registration_date',
        'membership_expiry_date',
        'membership_status',
        'membership_fee',
        'registration_checked_at',
        'payment_method',
        'receipt_no',
        'payment_receipt_path',
        'registration_snapshot',

        // Admin verification
        'admin_verified_by',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'registration_date' => 'date',
        'membership_expiry_date' => 'date',
        'registration_snapshot' => 'array',
    ];

    public function getFormattedMemberIdAttribute()
    {
        return 'KMM' . str_pad($this->member_id, 4, '0', STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function dependents()
    {
        return $this->hasMany(
            Dependent::class,
            'member_id',
            'member_id'
        );
    }

    public function payments()
    {
        return $this->hasMany(
            Payment::class,
            'member_id',
            'member_id'
        );
    }

    public function claims()
    {
        return $this->hasMany(
            Claim::class,
            'member_id',
            'member_id'
        );
    }
}