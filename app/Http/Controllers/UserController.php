<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        if ($cekDuplikatUser) {
            return redirect()->back()->with('error', 'Username sudah ada');
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
}
