<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsShopingCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'shoping_car_id', 'product_id'
    ];

    // Relacion uno a muchos entre Cart y CartDetail
    public function cars()
    {
        return $this->belongsTo(ShopingCar::class, 'shoping_car_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
