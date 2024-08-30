<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function show()
    {
        // $currentDateTime = now();
        // $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s'); // Includes seconds


        // $date = Carbon::now();
        // $formattedDate = $date->format('l jS \\of F Y h:i:s A'); // E.g., Sunday 7th of July 2024 02:42:35 PM


        return view('admin.dashboard', compact('currentDateTime', 'formattedDateTime'));
    }

    public function dashboard()
    {
        $totalGames = Game::count();
        $users = User::where('status', 1)->where('role_id', 1)->count();
        $results = Result::count();
        $userData = User::latest('id')->where('role_id', 1)->get();
        return view('admin.dashboard', [
            'totalGames' => $totalGames,
            'users' => $users,
            'results' => $results,
            'userData' => $userData
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function changePassword()
    {
        return view('admin.auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password'

        ]);

        if ($validator->passes()) {
            $user = Auth::guard('admin')->user();


            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->route('admin.changePassword')->with('error', 'Your Old Password is Incorrect! ');
            } else {

                User::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('success', 'Your Password changed successfully! ');
            }
        } else {
            return redirect()->route('admin.changePassword')->withInput()->withErrors($validator);
        }
    }
}
