<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariation extends Model
{
    use HasFactory;
    protected $primaryKey = 'variant_id';
    protected $fillable = [
        'product_id',
        'size',
        'regular_price',
        'sales_price',
        'stock',
    ];

    public function product(): BelongsTo{
        return $this->BelongsTo(Product::class,);
    }

    public function productAttr(): HasMany{
        return $this->hasMany(ProductAttribute::class,'variant_id', 'variant_id');
    }

}
