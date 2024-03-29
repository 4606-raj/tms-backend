<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'cat_id',
        'status',
    ];

    // Relationship for parent category
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    // Relationship for child categories
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'cat_id');
    }

    // Accessor for all descendants (recursive)
    public function descendants()
    {
        return $this->subcategories()->with('descendants');
    }
    
}
