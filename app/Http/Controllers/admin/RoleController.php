<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Permission_role;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function roleList(){
        $PermissionRole = Permission_role::getPermission('Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add Role',Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit Role',Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete Role',Auth::guard('admin')->user()->role_id);

        $data['getRecord'] = Role::getRecord(); 
        return view('admin.role.list',$data);
    }

    public function roleAdd(){
        $PermissionRole = Permission_role::getPermission('Add Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $getPermission = Permission::getRecord();
        $data['getPermission'] = $getPermission;
        return view('admin.role.add',$data);
    }
    public function roleCreate(Request $request){
        // dd($request->all()); permission_id
        $PermissionRole = Permission_role::getPermission('Add Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $role = new Role();
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();
        Permission_role::InsertUpdateRecord($request->permission_id,$role->id);
        return redirect()->route('admin.role.list')->with('success','Role Successfully Created!');
    }

    public function roleEdit($id){
        // echo $id;
        $PermissionRole = Permission_role::getPermission('Edit Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $data['getSingle'] = Role::getSingle($id); 

        $data['getPermission'] = Permission::getRecord();
        $data['getRolePermission'] = Permission_role::getRolePermission($id);
    
        return view('admin.role.edit',$data);

    }

    public function roleUpdate($id,Request $request){
        $PermissionRole = Permission_role::getPermission('Edit Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $role =  Role::getSingle($id);
        $role->name = $request->name;
        $role->status = $request->status;
        $role->save();
        Permission_role::InsertUpdateRecord($request->permission_id,$role->id);
        return redirect()->route('admin.role.list')->with('success','Role Successfully Updated!');
    }

    public function roleDelete($id){
        $PermissionRole = Permission_role::getPermission('Delete Role',Auth::guard('admin')->user()->role_id);
        if (empty($PermissionRole)) {
            return view('page-404-error');
        }
        $role =  Role::getSingle($id);
        $role->delete();
        return redirect()->route('admin.role.list')->with('success','Role Successfully Deleted!');
    }

    
}
