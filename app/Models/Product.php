<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //tabel database
    protected $table = 'products';

    //inputed for user
    protected $fillable = ['product_name','product_type','product_price','expaired_date'];
}
