<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class AdminController extends Controller
{
    public function adminLogin(Request $request)
{
    $credentials = [
        'username' => $request->username,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials, true)) {
        if ($request->remember) {
            Cookie::queue('userName', $request->username, 120);
            Cookie::queue('userPassword', $request->password, 120);
        }
        if (Auth::user()->role == 'Admin') {
            return redirect()->route('admin_dashboard');
        }
    } else {
        return redirect()->back()->withErrors([
            'username' => 'Authentication Failed!',
            'password' => 'Authentication Failed!',
        ]);
    }
}

    public function adminLogout()
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('userEmail'));
        Cookie::queue(Cookie::forget('userPassword'));
        return redirect()->route('admin_login');
    }

    public function homeIndex()
    {
        $all_admin = User::get();

        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return view('Admin.Dashboard', compact('all_admin'));
            }
        }
    }
}
