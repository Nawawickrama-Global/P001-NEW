<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id',
        'user_id',
        'first_name',
        'last_name',
        'address',
        'town',
        'city',
        'email',
        'postal_code',
        'contact_number',
        'coupon_id',
        'shipping_method_id',
        'total_amount',
        'status'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): HasMany{
        return $this->hasMany(User::class, 'order_id', 'order_id');
    }

}