<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderVariation extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_variation_id';
    protected $fillable = [
        'order_item_id',
        'variation_id'
    ];

    public function variation(): HasOne{
        return $this->hasOne(Variation::class, 'variation_id', 'variation_id');
    }

}
