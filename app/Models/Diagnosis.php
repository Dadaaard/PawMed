<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $table   = 'diagnosis';

    protected $fillable = [
        'diagnosis',
        'medicinename',
        'quantity',
        'doctor_id',
        'status',
        'pet_id',
    ];
}
