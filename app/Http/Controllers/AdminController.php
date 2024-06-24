<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\User;
use App\Models\Files;
use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Console\Command;
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
            } else if (Auth::user()->role == 'SuperAdmin') {
                return redirect()->route('superAdmin_dashboard');
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
        $all_computers = Computer::get();
        $all_files = Files::get();
        $all_subjects = Subject::get();
        $all_transactions = Transaction::get();
        $subjects = Subject::all()->keyBy('subject_code');

        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return view('Admin.Dashboard', compact('all_admin', 'all_computers', 'all_files', 'all_subjects'));
            } else
                (Auth::user()->role == 'SuperAdmin'); {
                return view('SuperAdmin.Dashboard', compact('all_admin', 'all_computers', 'all_files', 'all_subjects', 'all_transactions','subjects'));
            }

        }

    }
}
