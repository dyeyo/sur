<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsShopingCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'cart_id', 'product_id'
    ];



    // Relacion uno a muchos entre Cart y CartDetail
    public function carts()
    {
        return $this->belongsTo(ShopingCar::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
