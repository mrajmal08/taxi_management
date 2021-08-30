<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyEntry extends Model
{
    use HasFactory;

    public $table = 'daily_entries';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'driver_id',
        'work_date',
        'type',
        'route_id',
        'created_at',
        'updated_at',
        'duty',
        'description'
    ];

     public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function holiday()
    {
        return $this->belongsTo(Holiday::class, 'type');
    }

     public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

     public function contract()
    {
        return $this->belongsTo(Contract::class, 'driver_id','driver');
    }
}
