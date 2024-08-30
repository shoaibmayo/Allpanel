<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CricketVideo;

class CricketMatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_one',
        'team_two',
        'status',
    ];

    public function videos()
    {
        return $this->hasMany(CricketVideo::class, 'cricket_match_id');
    }
}
