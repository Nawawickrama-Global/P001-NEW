<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'coupon_id';
    protected $fillable = [
        'name',
        'value',
        'status',
        'number_of_users',
        'start_date',
        'end_date',
        'type',
        'start_time',
        'end_time'
    ];
}
