<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CasinoController extends Controller
{
    public function oneDayTeenpattiDetails(){
        // $posts = PostData::latest()->get();
        return view('frontend.casino.one-day-teenpatti', compact(['posts']));
    }
}
