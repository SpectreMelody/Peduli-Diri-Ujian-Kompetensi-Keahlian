<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    // bagian register
    public function RegisterPage(){
        return view('layouts.up');
    }

    public function SimpanRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'nik'=>'required|unique:users,email',
            'nama'=>'required',
        ],
        [
            'nik.unique'=>'NIK tidak valid atau sudah terdaftar!',
        ]);
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0],'error')->position('top-start');
            return back()->withInput();
        }

        if($request->input('confirm_nik') == $request->input('nik')){
            $data=[
                'nama'=>$request->nama,
                // 'nama_belakang'=>$request->nama_belakang,
                'email'=>$request->nik,
                'password'=>bcrypt($request->nik),
                // 'nik'=>$request->nik,
            ];
            // dd($data);

            User::create($data);
            Alert::toast("Registrasi Berhasil!",'success')->position('top-start');
            return back();
        }
        else{
            Alert::toast("Registrasi gagal, Mohon cek kembali!",'error')->position('top-start');
            return back();
        }
    }

    
}

