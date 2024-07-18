<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\User;
use App\Models\Files;
use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public function loginAccount(Request $request)
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
            if (Auth::user()->role == 'Tutor') {
                return redirect()->route('tutor_dashboard');
            } else if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin_dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong username or password.');
        }
    }

    public function logoutAccount()
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('userEmail'));
        Cookie::queue(Cookie::forget('userPassword'));
        return redirect()->route('login');
    }

    public function homePage(Request $request)
    {
        $users = User::get();
        $computers = Computer::get();
        $files = Files::get();
        $subjects = Subject::get();
        $transactions = Transaction::get();
        $subjects = Subject::all()->keyBy('subject_code');

        if (Auth::check()) {
            if (Auth::user()->role == 'Tutor') {
                if ($request->ip() == '127.0.0.3') {
                    return view('Tutor.314Dashboard', compact('users', 'computers', 'files', 'subjects', 'transactions'));
                } elseif ($request->ip() == '127.0.0.1') {
                    return view('Tutor.315Dashboard', compact('users', 'computers', 'files', 'subjects', 'transactions'));
                } elseif ($request->ip() == '128.0.0.2') {
                    return view('Tutor.316Dashboard', compact('users', 'computers', 'files', 'subjects', 'transactions'));
                }  elseif ($request->ip() == '128.0.0.3') {
                    return view('Tutor.317Dashboard', compact('users', 'computers', 'files', 'subjects', 'transactions'));
                }
            }
            if (Auth::user()->role == 'Admin') {
                return view('Admin.Dashboard', compact('users', 'computers', 'files', 'subjects', 'transactions'));
            }
        }
    }
}
