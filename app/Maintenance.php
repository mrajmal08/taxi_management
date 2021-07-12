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
        'vehicle_id',
        'labor_cost',
        'labor_vat',
        'millage',
        'cost',
        'vat',
        'maintenance_by',
        'description',
        'created_at',
        'updated_at'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier');
    }

    public function maintain()
    {
        return $this->belongsTo(Maintainer::class, 'maintenance_by');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

}
