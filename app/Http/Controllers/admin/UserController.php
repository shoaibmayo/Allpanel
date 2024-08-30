<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Permission_role;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


    public function userList()
    {
        $PermissionUser = Permission_role::getPermission('User', Auth::guard('admin')->user()->role_id);
        if (empty($PermissionUser)) {
            return view('page-404-error');
        }
        $data['PermissionAdd'] = Permission_role::getPermission('Add User', Auth::guard('admin')->user()->role_id);
        $data['PermissionEdit'] = Permission_role::getPermission('Edit User', Auth::guard('admin')->user()->role_id);
        $data['PermissionDelete'] = Permission_role::getPermission('Delete User', Auth::guard('admin')->user()->role_id);

        $data['getRecord'] = User::getRecord();
        return view('admin.user.list', $data);
    }

    public function userAdd()
    {
        $data['getRole'] = Role::getRecord();
        return view('admin.user.add', $data);
    }

    public function userCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required',
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->save();
        return redirect()->route('admin.user.list')->with('success', 'User created successfully.');
    }

    public function userEdit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = Role::getRecord();
        return view('admin.user.edit', $data);
    }


    public function status($id)
    {
        $user = User::getSingle($id);

        if ($user) {
            if ($user->status) {
                $user->status = 0;
            } else {
                $user->status = 1;
            }
            $user->save();
        }

        return back();
    }


    public function userUpdate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role_id' => 'required',
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);
        $user->save();
        return redirect()->route('admin.user.list')->with('success', 'User updated successfully.');
    }

    public function userDelete($id)
    {
        $user = User::getSingle($id);
        if ($user->role_id == 5) {
            return redirect()->route('admin.user.list')->with('error', 'You Cannot Delete Record Because It Is Super Admin!');
        } else {
            $user->delete();
            return redirect()->route('admin.user.list')->with('success', 'User deleted successfully.');
        }
    }
}
