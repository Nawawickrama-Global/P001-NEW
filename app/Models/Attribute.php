<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;
    protected $primaryKey = 'attribute_id';
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function variation():HasMany
    {
        return $this->hasMany(Variation::class, 'attribute_id');
    }
}
