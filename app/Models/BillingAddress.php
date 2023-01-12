<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'street', 'second_street', 'city', 'state', 'country', 'postal_code', 'phone'];
}
