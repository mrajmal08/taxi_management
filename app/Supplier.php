<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public $table = 'suppliers';

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
