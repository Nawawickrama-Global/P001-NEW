<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'product_id',
        'variant_id',
        'qty',
        'user_id'
    ];

    public function variant(): HasOne{
        return $this->hasOne(ProductVariation::class, 'variant_id', 'variant_id');
    }

    public function product(): HasOne{
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    public function cartVariation(): HasMany{
        return $this->hasMany(CartVariation::class, 'cart_item_id', 'cart_id');
    }
}
