<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';

    // The attributes that are mass assignable.
    protected $fillable = [
        'parent_category_id','title','image','description',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'parent_category_id' => 'integer',
    ];

    // Timestamps
    public $timestamps = true;

    // Define the relationship with the parent category
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    // Define the relationship with child categories
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

}
