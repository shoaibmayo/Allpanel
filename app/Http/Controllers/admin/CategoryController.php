<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Permission_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categoryList(){  
        $PermissionCategory = Permission_role::getPermission('Category',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionCategory)) {
            return view('page-404-error');
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add Category',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit Category',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete Category',Auth::guard('admin')->user()->role_id);

        $data['categories']  = Category::all();
        return view('admin.category.list',$data);
    }

    public function categoryAdd(){ 
        return view('admin.category.add');
    }

    public function categoryCreate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
            'status' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Category created successfully.');

       
    }

    public function categoryEdit($id){
        $data['category'] = Category::find($id);
        return view('admin.category.edit',$data);
    }

    public function categoryUpdate($id,Request $request){ 
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'status' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Category updated successfully.');
        
    } 

    public function categoryDelete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.list')->with('success', 'Category deleted successfully.');
    }
}
