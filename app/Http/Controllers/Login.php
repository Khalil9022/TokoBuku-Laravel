<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $user = DB::table('tbl_user')->insert([
            'nama_user' => $request->nama,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/Login')->with('alert', 'Berhasil!');
    }

    public function masuk(Request $request)
    {
        $user = DB::table('tbl_user')->where('email', $request->email)->first();
        if (!isset($user)) {
            return redirect('/Login')->with('warning', 'Email Salah!');
        }
        if ($user->password == $request->password) {
            $request->session()->put('id', $user->id);
            //echo 'Data disimpan dengan session ID = ' . $request->session()->get('id');
            return redirect('/');
        } else {
            //echo "Anda gagal Login!";
            return redirect('/Login')->with('warning', 'Gagal Login!');
        }
    }
}
