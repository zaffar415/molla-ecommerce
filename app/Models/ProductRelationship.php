<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRelationship extends Model
{
    use HasFactory;

    protected $fillable = array('product_id','term_id');

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function terms() {
        // return $this->hasOne(ProductTerm::class, 'id', 'term_id');
        return $this->belongsTo(ProductTerm::class, 'term_id', 'id');        
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
