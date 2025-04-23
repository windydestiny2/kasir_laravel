<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AdminAuthController extends Controller
{
    //
    function index()
    {
        return view('admin.auth.login');
    }
    function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            Alert::success('Success!', 'Selamat datang di dashboard admin');
            return redirect('/admin/dashboard');
        } 
        return back()->with('loginError', 'Email atau password salah');
        
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
