<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class loginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logOut');
    }

    public function LoginPage(){
        return view('layouts.in');
    }

    public function Login(Request $request){
        if (Auth::attempt($request->only('nama','email','password'))){
            return redirect('/')->with('success','Login Berhasil!');
        }
        Alert::toast('Login Gagal!','error')->position('top-start');
        return back();
    }

    public function logOut(){
        Auth::logout();
        return redirect('/login');
    }
}
