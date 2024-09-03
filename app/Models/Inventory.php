<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Inventory extends Model implements AuditableContract
{
    use HasFactory;
    use Auditable;


    protected $table = 'inventory';

    protected $fillable = [
        'DrugCode',
        'GenericName',
        'Brandname',
        'Quantity',
        'Category',
        'ExpDate',
        'Dosage',
        'Price',
    ];




}
