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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();

            if ($user->id_role == 1) {
                // dd($user);
                return redirect()->intended('admin/dashboard');
            } elseif ($user->id_role == 2) {
                return redirect()->intended('client/dashboard');
            } else {
                abort(404);
            }
        } else {
            Session::flash('status', 'failed!');
            return redirect()->back()->withInput()->with('message', 'login failed!');
        }
    }
}
