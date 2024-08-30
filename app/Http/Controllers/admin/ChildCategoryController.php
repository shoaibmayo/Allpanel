<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\Permission_role;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildCategoryController extends Controller
{  
    public function childCategoryList(){  

        $PermissionSubCategory = Permission_role::getPermission('ChildCategory',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionSubCategory)) {
            return view('page-404-error'); 
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add ChildCategory',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit ChildCategory',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete ChildCategory',Auth::guard('admin')->user()->role_id);


        $childcategories = ChildCategory::leftJoin('sub_categories', 'sub_categories.id', '=', 'child_categories.subcategory_id')
        ->select('child_categories.*', 'sub_categories.name as subcategoryName')
        ->get();
        $data['childcategories'] = $childcategories; 
        return view('admin.child_category.list',$data);
    }

    public function childCategoryAdd(){ 
        $subcategories = SubCategory::orderBy('name','ASC')->get(); 
        return view('admin.child_category.add',compact('subcategories'));
    }


    public function childCategoryCreate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:child_categories',
            'status' => 'required',
            'subcategory' => 'required',
        ]);
        $childcategory = new ChildCategory();
        $childcategory->name = $request->name;
        $childcategory->slug = $request->slug;
        $childcategory->status = $request->status;
        $childcategory->subcategory_id = $request->subcategory;
        $childcategory->save();
        return redirect()->route('admin.childcategory.list')->with('success', 'Child category created successfully.');

       
    }

    public function childCategoryEdit($id){
        $childcategory = ChildCategory::find($id);
        if(empty($childcategory)){
            return redirect()->route('admin.childcategory.list')->with('error', 'Record Not Found!.');
        }
        $subcatagory = SubCategory::orderBy('name','ASC')->get(); 
        $data['subcatagory'] = $subcatagory;
        $data['childcategory'] = $childcategory;
        return view('admin.child_category.edit',$data);
    }


    public function childCategoryUpdate($id,Request $request){ 
        $childcategory = ChildCategory::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:child_categories,slug,'.$childcategory->id.',id',
            // 'slug' => 'required|unique:sub_categories',
            'status' => 'required',
            'subcategory' => 'required',
        ]);
        $childcategory->name = $request->name;
        $childcategory->slug = $request->slug;
        $childcategory->status = $request->status;
        $childcategory->subcategory_id = $request->subcategory;
        $childcategory->save();
        return redirect()->route('admin.childcategory.list')->with('success', 'Child category updated successfully.');
        
    } 

    public function childCategoryDelete($id){
        $childcategory = ChildCategory::find($id);
        $childcategory->delete();
        return redirect()->route('admin.childcategory.list')->with('success', 'Child category deleted successfully.');
    }
}
