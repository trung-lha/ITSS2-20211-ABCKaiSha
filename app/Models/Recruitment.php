<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['name', 'description', 'location', 'salary', 'img', 'limitation'];
}
