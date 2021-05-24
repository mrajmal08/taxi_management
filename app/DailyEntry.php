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
        'created_at',
        'updated_at'
    ];

     public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function holiday()
    {
        return $this->belongsTo(Holiday::class, 'type');
    }
}
