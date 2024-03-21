<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPAddressController extends Controller
{
    public function showIP(Request $request)
    {
        $ipAddress = $request->ip();

        return view('ip', compact('ipAddress'));
    }
}
