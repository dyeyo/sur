<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopingCar extends Model
{
    use HasFactory;
    protected $fillable = ['order_date', 'status', 'user_id'];

    // Acceso al valor total del pedido
    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->quantity * $detail->product->price;
        }
        return $total;
    }


    public function details()
    {
        return $this->hasMany(DetailsShopingCar::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
