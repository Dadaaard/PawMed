<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Transaction extends Model implements AuditableContract
{
    use HasFactory;
    use Auditable;
    protected $guarded = [];

    protected $table = 'transaction';

    protected $fillable = [
        'Name',
        'Email',
        'Date',
        'MedicineOrdered',
        'Quantity',
        'Total',
        'Status',
    ];
}
