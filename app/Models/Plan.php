<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'phone', 'email', 'postcode', 'content', 'address', 'status'];
    public $timestamps = true;

    public function format()
    {
        return [
            'id' => $this->id,
            'username' => $this->username, 
            'phone' => $this->phone, 
            'email' => $this->email, 
            'postcode' => $this->postcode, 
            'content' => $this->content, 
            'address' => $this->address, 
            'status' => $this->status,
            'products' => $this->products,
        ];
    }

    public function products()
    {
        return $this->belongsToMany("App\Models\Product", "plan_products", "product_id", "plan_id");
    }
}
