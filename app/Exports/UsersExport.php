<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
   public function view(): View
    {
        $users = User::getRecord();
        return view('admin.user.user-export', [
            'users' => $users 
        ]);
    }
}
