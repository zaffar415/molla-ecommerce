<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "address",
        "city",
        "state",
        "country",
        "pincode",
        "phone",
        "notes",
        "items",
        "total",
        "payment_mode",
        "payment_id",
        "status",        
    ];
}
