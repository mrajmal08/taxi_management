<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $table = 'expenses';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'entry_date',
        'supplier',
        'discription',
        'sub_total',
        'vat',
        'paymnet_method',
        'paymnet_reference',
        'created_at',
        'updated_at'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier');
    }
}
