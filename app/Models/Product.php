<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'month'];
    protected $table = 'products';
    public $timestamps = true;

    public function format()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'month' => $this->month,
            'image' => $this->images()->first()->url,
            'category_name' => $this->category()->first()->name,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function plans() {
        return $this->belongsToMany(Plan::class, 'plan_product');
    }
}
