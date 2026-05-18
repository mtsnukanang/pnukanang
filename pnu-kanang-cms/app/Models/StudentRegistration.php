<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'full_name',
        'nickname',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'phone',
        'parent_name',
        'parent_phone',
        'previous_school',
        'program',
        'notes',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public const STATUSES = [
        'baru' => 'Baru',
        'diproses' => 'Diproses',
        'diterima' => 'Diterima',
        'ditolak' => 'Ditolak',
    ];
}
