<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $primaryKey = 'claim_id';

    protected $fillable = [
        'member_id',
        'claim_date',
        'claim_type',

        'deceased_name',
        'deceased_ic',
        'date_of_death',
        'place_of_death',
        'cause_of_death',
        'relationship',

        'death_certificate_no',

        'member_ic_document',
        'death_certificate_document',
        'burial_permit_document',
        'marriage_certificate_document',
        'birth_certificate_document',
        'bank_statement_document',

        'status',
        'claim_amount',
        'admin_verified_by',
        'verification_date',
        'rejection_remark',
    ];

    protected $casts = [
        'claim_date' => 'date',
        'date_of_death' => 'date',
        'verification_date' => 'date',
    ];

    // Relationship: Claim belongs to one member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}