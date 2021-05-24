<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    public $table = 'maintenances';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'entry_date',
        'supplier',
        'vehicle_reg',
        'plate_no',
        'millage',
        'cost',
        'vat',
        'created_at',
        'updated_at'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier');
    }

}
