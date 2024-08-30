<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';

    static public function getSingle($id){
        return Role::findOrFail($id);
    }

    static public function getRecord(){
        $permission = Permission::groupBy('groupby')->get();
        $result = array();
        foreach ($permission as  $value) {
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = array();
            foreach ($getPermissionGroup as  $valueG) {
                $dataG = array();
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG; 
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    static function getPermissionGroup($groupby){
        return Permission::where('groupby','=',$groupby)->get();
    }

}
