<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;


    public $table = 'peoples';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'post_code',
        'area',
        'created_at',
        'updated_at'
    ];

     public function people()
    {
        return $this->belongsTo(Area::class, 'area');
    }
}
