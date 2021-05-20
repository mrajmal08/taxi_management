<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    public $table = 'badge';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'badge',
        'badge_renewal_date',
        'created_at',
        'updated_at'
    ];
}
