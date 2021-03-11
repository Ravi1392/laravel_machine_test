<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    public $table = "product_stocks";
    
    public $fillable = ['name', 'qty', 'price'];
    //use HasFactory;
}
