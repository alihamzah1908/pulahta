<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('landing');
    }

    public function prosess(Request $request)
    {
        $check = \App\Models\User::where('username', $request["username"])->first();
        if(!$check){
            return redirect()->back()->with('error','Username tidak tersedia. Mohon coba kembali');
        }
        if(!(Hash::check($request["password"], $check->password))){
            return redirect()->back()->with("error","Password anda salah. Mohon coba kembali.");
        }
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        Auth::attempt($credentials);
        if (Auth::check()) {
            $user = \App\Models\User::where('username', $request["username"])->first();
            if ($user) {
                if ($user->role == 'super admin' || $user->role == 'Admin') {
                    return redirect(route('dashboard'));
                } else {
                    return redirect(route('dataset'));
                }
            } else {
                return redirect()->back()->with('error','Username tidak tersedia');
            }
        } else {
            return redirect()->back()->with('error','Gagal login password dan username tidak valid ');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
