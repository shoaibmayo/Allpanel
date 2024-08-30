<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'slug',
        'status',
        'category_id',
        'sub_category_id',
        'child_category_id',
        'game_description'
    ];

    // public function childcategory()
    // {
    //     return $this->belongsTo(ChildCategory::class);
    // }

    public function game_images()
    {
        return $this->hasMany(Game_image::class);
    }

    public function game_videos()
    {
        return $this->hasMany(Game_video::class);
    }

   
}
