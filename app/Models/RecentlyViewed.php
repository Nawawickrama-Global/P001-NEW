<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecentlyViewed extends Model
{
    use HasFactory;
    protected $primaryKey = 'recently_viewed_id';
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
