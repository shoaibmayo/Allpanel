<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Metadata\Uses;

class AccountController extends Controller
{
    public function login()
    {
        return view('frontend.account.login');
    }

    public function checklogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->passes()) {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                if (Auth::guard('web')->user()->role_id == 1) {
                    return redirect()->route('front.home');
                } else {
                    Auth::guard('web')->logout();
                    return redirect()->route('front.login')->with('error', 'You are not authorized to access  ');
                }
            } else {
                return redirect()->back()->with('error', 'email or password something want wrong!');
            }
        } else {
            return redirect()->route('front.login')->withInput()->withErrors($validator);
        }
    }

    public function accountStatement()
    {   $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.account-statement',$data);
    }
    public function changePassword()
    {   $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.change-password',$data);
    }

    public function updatePassword(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password'

        ]);

        if ($validator->passes()) {
            $user = User::select('id', 'password')->where('id', Auth::user()->id)->first();

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->route('front.changePassword')->with('error', 'Your Old Password is Incorrect! ');
            } else {
                User::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
                Auth::logout();
                return redirect()->route('front.login')->with('success', 'Your Password changed successfully ! ');
                // Auth::logout();
                // return redirect()->route('front.login');
            }
        } else {
            return redirect()->route('front.changePassword')->withInput()->withErrors($validator);
        }
    }

    public function profitLossReport()
    {
        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.profit-loss-reports',$data);
    }
    public function betHistory()
    {
        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.bet-history',$data);
    }
    public function unsetteledBet()
    {
        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.unsetteled-bet',$data);
    }
    public function setButtonValue()
    {
        $categorySelected = '';
        $subcategorySelected = '';
        $childcategorySelected = '';

        $data['categorySelected'] = $categorySelected;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['childcategorySelected'] = $childcategorySelected;
        return view('frontend.account.set-button-value',$data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.login');
    }
}
