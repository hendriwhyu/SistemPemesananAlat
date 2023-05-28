<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function user()
    {
        $data = User::all();
        return view('admin.DataUser.user', ['ListUser' => $data]);
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
        $cekDuplikatUser = User::where('username', $request->username)->count();
        $cekDuplikatEmailUser = User::where('username', $request->email)->count();
        if ($cekDuplikatUser || $cekDuplikatEmailUser) {
            return redirect()->back()->with('error', 'Username / Email sudah ada');
        } else {
            $data = User::where('id_users', $request->id_users);
            // dd($data);
            $data->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'id_role' => $request->role
            ]);
            return redirect()->back()->with('success', 'Data User telah diubah');
        }
    }
    public function delete(Request $request)
    {
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
    }
}
