<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'brand', 'model', 'category', 'price', 'stock_quantity'];

    public function attributes() {
        return $this->hasMany(ProductAttribute::class);
    }

    public function saleItems() {
        return $this->hasMany(SaleItem::class);
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category', 'name');
    }
}
