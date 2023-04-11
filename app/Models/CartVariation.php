<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartVariation extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_variation_id';
    protected $fillable = [
        'cart_item_id',
        'variation_id'
    ];
    
    public function variation():HasOne
    {
        return $this->hasOne(Variation::class, 'variation_id', 'variation_id');
    }
}
