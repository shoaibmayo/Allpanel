<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    static public function getRecord(){
        return Role::get();
    }

    static public function getSingle($id){
        return Role::findOrFail($id);
    }

}
