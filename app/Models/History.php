<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'id',
        'petname',
        'doctorname',
        'diagnosis',
        'medicine',
        'quantity',
        'Status',
        'pet_id',
    ];
}
