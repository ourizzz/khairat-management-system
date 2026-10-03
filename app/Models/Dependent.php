<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $primaryKey = 'dependent_id';

    protected $fillable = [
        'member_id',
        'full_name',
        'ic_number',
        'date_of_birth',
        'age',
        'relationship',
        'status',
        'is_student',
        'student_proof_path',
    ];

    // Relationship: Dependent belongs to one member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}