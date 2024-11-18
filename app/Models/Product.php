<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = array('title','slug','small_description','description', 'additional_information','images','price','sale_price');

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    public function terms() {
        return $this->hasMany(ProductRelationship::class, 'product_id', 'id')->with('terms');
    }
}
