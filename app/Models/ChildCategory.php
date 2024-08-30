<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
        // return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
