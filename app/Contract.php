<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public $table = 'contracts';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'route',
        'people',
        'start',
        'finish',
        'driver',
        'cost_per_day',
        'pay_per_day',
        'vat_amount',
        'created_at',
        'updated_at'
    ];

     public function peoples()
    {
        return $this->belongsTo(People::class, 'people');
    }

     public function routes()
    {
        return $this->belongsTo(Route::class, 'route');
    }

    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'driver');
    }
}
