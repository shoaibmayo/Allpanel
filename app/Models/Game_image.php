<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_image extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id', 
        'file_path',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
