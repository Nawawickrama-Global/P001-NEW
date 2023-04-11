<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'user_id',
        'profession',
        'address',
        'postal_code',
        'country',
        'city',
    ];

    public function user(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
