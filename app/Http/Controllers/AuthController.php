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
        $credentials = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );
        // $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd($request);
            $user = Auth::user();
            if ($user->id_role == 1) {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->id_role == 2) {
                return redirect()->intended('client/dashboard');
                if (!redirect()->intended('/dashboard')) {
                    abort(404);
                }
            }
        } else {
            // return back()->withErrors([
            //     'username' => 'The provided credentials do not match our records.',
            // ])->onlyInput('username');
            Session::flash('status', 'failed!');
            // Session::flash('message', 'Gagal login Akun');
            return redirect()->back()->withInput()->with('message', 'login failed!');
            // return redirect('login');
        }
    }
}
