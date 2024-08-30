<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CricketVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'cricket_match_id',
        'team',
        'video_path',
        'result',
    ];
    public function cricketMatch()
    {
        return $this->belongsTo(CricketMatch::class, 'cricket_match_id');
    }
}
