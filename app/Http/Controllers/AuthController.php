<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function register()
    {
        return view('register');
    }
    public function authentication(Request $request)
    {

        // Validasi data yang dikirimkan oleh form login
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->id_role == 1) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->id_role == 2) {
                return redirect()->route('client.dashboard');
            }
        } else {
            // return back()->withErrors([
            //     'username' => 'The provided credentials do not match our records.',
            // ])->onlyInput('username');

            Session::flash('status', 'failed!');
            Session::flash('message', 'Gagal login Akun');
            return redirect('login');
        }
    }
}
