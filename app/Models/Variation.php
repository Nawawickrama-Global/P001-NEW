<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Variation extends Model
{
    use HasFactory;
    protected $primaryKey = 'variation_id';
    protected $fillable = [
        'attribute_id',
        'name',
        'percentage',
        'image'
    ];

    public function attribute(): HasOne{
        return $this->hasOne(Attribute::class, 'attribute_id', 'attribute_id');
    }

}
