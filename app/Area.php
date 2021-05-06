<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    public $table = 'areas';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

}
