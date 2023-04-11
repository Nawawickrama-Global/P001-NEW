<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inquiry extends Model
{
    use HasFactory;
    protected $primaryKey = 'inquiry_id';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'product_id',
        'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product(): HasOne{
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
