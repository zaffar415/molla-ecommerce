<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    public $fillable = ['product_id', 'user_id', 'quantity'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');        
    }
}
