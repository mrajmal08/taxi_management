<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverReceipt extends Model
{
    use HasFactory;

     public $table = 'driver_receipts';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'start_date',
        'end_date',
        'driver_id',
        'vat',
        'created_date',
        'created_at',
        'updated_at'
    ];

     public function drivers()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
