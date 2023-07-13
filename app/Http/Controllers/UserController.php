<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function user()
    {
        $data = User::all();
        return view('admin.DataUser.user', ['ListUser' => $data]);
    }
    
    public function profile()
    {
        $dataUsers = User::where('username', Auth::user()->username)->first();
        if(Auth::user()->id_role == '1'){
            return view('admin.profile', ['dataUsers' => $dataUsers]);
        }elseif(Auth::user()->id_role == '2'){
            return view('client.profile', ['dataUsers' => $dataUsers]);
        }elseif(Auth::user()->id_role == '3'){
            return view('manager.profile', ['dataUsers' => $dataUsers]);
        }
    }

    public function addUser(Request $request)
    {
        $cekDuplikatUser = User::where('username', $request->username)->count();
        $cekDuplikatEmailUser = User::where('username', $request->email)->count();
        if ($cekDuplikatUser || $cekDuplikatEmailUser) {
            return redirect()->back()->with('error', 'Username / Email sudah ada');
        } else {
            $data = new User;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->id_role = $request->role;
            $data->save();
            return redirect()->back()->with('success', 'Data user telah ditambahkan');
        }
    }
    public function update(Request $request)
    {
        $data = User::where('id_users', $request->id_users);
        if ($request->password == null) {
            return redirect()->back()->with('error', 'Password anda kosong');
        } else {
            $data->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'id_role' => $request->role
            ]);
            return redirect()->back()->with('success', 'Data User telah diubah');
        }
    }
    public function editProfile(Request $request)
    {
        $data = User::where('id_users', $request->id_users);
        $data->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'ktp' => $request->nik
        ]);
        return redirect()->back()->with('success', 'Profile telah diubah');
    }
    public function editPassword(Request $request)
    {
        $data = User::where('id_users', $request->id_users);
        $data->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'ktp' => $request->ktp,
            'password' => Hash::make($request->password)
        ]);
        if ($request->password == $request->password_confirmation) {
            return redirect()->back()->with('success', 'Password telah diubah');
        } else {
            return redirect()->back()->with('error', 'Confirm password anda salah');
        }
    }
    public function delete(Request $request)
    {
        try{
            $data = User::where('id_users', $request->id_users);
            $data->delete();
            if ($data) {
                Session::flash('status', 'success');
                Session::flash('message', 'Hapus Kategori Berhasil');
                return back();
            } else {
                Session::flash('status', 'error');
                Session::flash('message', 'Hapus Kategori Gagal');
                return back();
            }
        }catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus data karena user telah menyewa');
        }
    }
}
