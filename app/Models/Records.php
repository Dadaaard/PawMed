<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    use HasFactory;

    protected $table = 'records';

    protected $guarded = [];

    protected $fillable = [
        'diagnosis',
        'Medicine',
        'Quantity',
        'pet_id',
        'Status',
        'doctor_id',

    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
