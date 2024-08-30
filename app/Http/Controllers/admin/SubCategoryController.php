<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Permission_role;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function subCategoryList(){ 
        $PermissionSubCategory = Permission_role::getPermission('SubCategory',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionSubCategory)) {
            return view('page-404-error'); 
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add SubCategory',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit SubCategory',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete SubCategory',Auth::guard('admin')->user()->role_id);


        $subcategories = SubCategory::leftJoin('categories', 'categories.id', '=', 'sub_categories.category_id')
        ->select('sub_categories.*', 'categories.name as categoryName')
        // ->orderBy('created_at','ASC')
        ->get();
        $data['subcategories'] = $subcategories; 
        return view('admin.subcategory.list',$data);
    }

    public function subCategoryAdd(){ 
        $categories = Category::orderBy('name','ASC')->get(); 
        return view('admin.subcategory.add',compact('categories'));
    }

    public function subCategoryCreate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:sub_categories',
            'status' => 'required',
            'category' => 'required',
        ]);
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category;
        $subcategory->save();
        return redirect()->route('admin.subcategory.list')->with('success', 'Sub category created successfully.');

       
    }

    public function subCategoryEdit($id){
        $subcategory = SubCategory::find($id);
        if(empty($subcategory)){
            return redirect()->route('admin.subcategory.list')->with('error', 'Record Not Found!.');
        }
        $catagory = Category::orderBy('name','ASC')->get(); 
        $data['catagory'] = $catagory;
        $data['subcategory'] = $subcategory;
        return view('admin.subcategory.edit',$data);
    }

    public function subCategoryUpdate($id,Request $request){ 
        $subcategory = SubCategory::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:sub_categories,slug,'.$subcategory->id.',id',
            // 'slug' => 'required|unique:sub_categories',
            'status' => 'required',
            'category' => 'required',
        ]);
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category;
        $subcategory->save();
        return redirect()->route('admin.subcategory.list')->with('success', 'Sub category updated successfully.');
        
    } 

    public function subCategoryDelete($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategory.list')->with('success', 'Sub category deleted successfully.');
    }


}
