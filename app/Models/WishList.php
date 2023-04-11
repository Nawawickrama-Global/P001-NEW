<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WishList extends Model
{
    use HasFactory;
    protected $primaryKey = 'wish_list_id';
    protected $fillable = [
        'product_id',
        'user_id'
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
