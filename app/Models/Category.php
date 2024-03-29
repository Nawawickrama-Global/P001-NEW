<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name',
        'description',
        'category_image',
        'status'
    ];

    public function subcategory(){
        return $this->hasMany(SubCategory::class, 'category_id', 'category_id');
    }
}
