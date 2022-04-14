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
            $query->where('in_stock', $search == 'true' ? true : false); // TODO: make this work with bools?
        });
    }

    public function hasTag(Tag $tag): bool
    {
        return $this->tags->contains($tag);
    }
}
