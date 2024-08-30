<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
    use HasFactory;
    protected $table = 'permission_roles';

    static function InsertUpdateRecord($permission_ids,$role_id){
        Permission_role::where('role_id','=',$role_id)->delete();
        foreach ($permission_ids as  $permission_id) {
            $permissionRole = new Permission_role;
            $permissionRole->permission_id = $permission_id; 
            $permissionRole->role_id = $role_id;
            $permissionRole->save();
        }
    }

    static function getRolePermission($role_id){
        return Permission_role::where('role_id','=',$role_id)->get();
    }

    static function getPermission($slug,$role_id){
        return Permission_role::select('permission_roles.id')
        ->join('permissions','permissions.id','=','permission_roles.permission_id')
        ->where('permission_roles.role_id','=',$role_id)
        ->where('permissions.slug','=',$slug)
        ->count();
    }
}




