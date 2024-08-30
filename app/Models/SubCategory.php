<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function childcategories()
    {
        return $this->hasMany(ChildCategory::class, 'subcategory_id');
        // return $this->hasMany(Childcategory::class, 'sub_category_id');
    }
}
