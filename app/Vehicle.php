<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'vehicles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'mot',
        'mot_expiry',
        'vehicle_reg',
        'plate_no',
        'plate_no_expiry',
        'insurance_company',
        'insurance_company_expiry',
        'plate_issue_authority',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
