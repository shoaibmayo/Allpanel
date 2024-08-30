<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class Game_subcategory_child_categoryController extends Controller
{
    public function fetchSubCategory(Request $request){
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);

        // if(!empty($request->category_id)){
        //     $subcategory = SubCategory::where('category_id',$request->category_id)->orderBy('name','ASC')->get();
        //     return response()->json([
        //         'status' => true,
        //         'subcategory' => $subcategory
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'subcategory' => []
        //     ]);
        // }
       
    }

    public function fetchChildCategory(Request $request){
        $childCategories = ChildCategory::where('subcategory_id', $request->subcategory_id)->get();
        return response()->json($childCategories);

        // if(!empty($request->subcategory_id)){
        //     $childcategory = ChildCategory::where('subcategory_id',$request->subcategory_id)->orderBy('name','ASC')->get();
        //     return response()->json([
        //         'status' => true,
        //         'childcategory' => $childcategory
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'childcategory' => []
        //     ]);
        // }
      
    }
}
