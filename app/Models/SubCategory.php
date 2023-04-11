<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'sub_category_id';
    protected $fillable = [
        'name',
        'description',
        'category_image',
        'status',
        'category_id'
    ];
    public function parent(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
