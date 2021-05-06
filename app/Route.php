<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory, MultiTenantModelTrait;

    public $table = 'routes';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'route_id',
        'address',
        'created_at',
        'updated_at'
    ];
}
