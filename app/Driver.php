<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory,SoftDeletes, MultiTenantModelTrait;

    public $table = 'drivers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'country_code',
        'phone',
        'address',
        'email',
        'license_no',
        'license_expiry',
        'gender',
        'dob',
        'is_verified',
        'is_active',
        'car_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function car()
    {
        return $this->belongsTo(ExpenseCategory::class, 'car_type');
    }
}
