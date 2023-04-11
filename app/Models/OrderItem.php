<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_item_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_type',
        'variant_id',
        'qty'
    ];

    public function product(): HasOne{
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    public function variant(): HasOne{
        return $this->hasOne(ProductVariation::class, 'product_id', 'product_id');
    }

    public function orderVariation(): HasMany{
        return $this->hasMany(OrderVariation::class, 'order_item_id', 'order_item_id');
    }

}
