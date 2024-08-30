<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Game;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {

        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $games = Game::orderBy('id', 'DESC')->where('status', 1)->get();
        $data['games'] = $games;
        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.home', $data);
    }



    public function gameDetails(Request $request,  $categorySlug = null, $subCategorySlug = null, $childCategorySlug = null)
    {
        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $games = Game::where('status', 1);

        if (!empty($categorySlug)) {
            $category = Category::where('slug', $categorySlug)->first();
            $games = $games->where('category_id', $category->id);
            $categorySelected = $category->id;
        }

        if (!empty($subCategorySlug)) {
            $subcategory = SubCategory::where('slug', $subCategorySlug)->first();
            $games = $games->where('sub_category_id', $subcategory->id);
            $subcategorySelected = $subcategory->id;
        }

        if (!empty($childCategorySlug)) {
            $childcategory = ChildCategory::where('slug', $childCategorySlug)->first();
            $games = $games->where('child_category_id', $childcategory->id);
            $childcategorySelected = $childcategory->id;
        }

        $games = $games->orderBy('id', 'DESC');
        $games = $games->get();

        $data['games'] = $games;
        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;

        return view('frontend.gameDetails', $data);
    }

    public function plyGame($slug)
    {

        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $game = Game::where('slug',$slug)->with('game_videos')->first();
        if ($game == null) {
            abort(404);
        }
        $data['game'] = $game;
        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.plyGame',$data);
    }
}
