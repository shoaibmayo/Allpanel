<?php

use App\Models\Category;
use App\Models\Game;
function getCategory()
{
    
    return Category::orderBy('name', 'ASC')
        ->with('subcategories.childcategories')
        ->where('status', 1)->get();
}


// function games()
// {
    
//     return $games = Game::orderBy('id', 'DESC')->where('status', 1)->get();
// }
