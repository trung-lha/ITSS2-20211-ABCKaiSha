<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'plan_id', 'productName'];
    protected $table = 'plan_product';
    public $timestamps = true;
}
