<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function subProducts()
    {
        return $this->belongsToMany(Product::class, 'product_products', 'main_product_id', 'sub_product_id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['in_stock'] ?? null, function ($query, $search) {
            // TODO:: Problem with 0 not being parsed in the query
            $query->where('in_stock', $search);
        });
    }
}
