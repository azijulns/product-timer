<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductDetail extends Model
{
    use HasFactory;
    protected $table= 'product_details';
    protected $fillable = [
        'shop_id',
        'product_id',
        'title',
        'created_time',
    ];
}
