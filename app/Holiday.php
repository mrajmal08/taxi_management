<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    public $table = 'holidays';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'holiday_type',
        'created_at',
        'updated_at'
    ];
}
