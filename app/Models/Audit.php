<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'audit';

    protected $fillable = [
        'Name',
        'Email',
        'LastLoginTime',
        'LastLoginOutTime',
        'Status',
        'IpAddress',
        'Verified',
    ];

    
    

}
