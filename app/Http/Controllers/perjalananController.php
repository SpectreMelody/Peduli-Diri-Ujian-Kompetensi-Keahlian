<?php

namespace App\Http\Controllers;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

class perjalananController extends Controller
{
    public function InputPerjalananPage(){
        $data = DB::table('perjalanans')
        ->join('users', 'users.id', '=', 'perjalanans.id_user')
        ->select('perjalanans.created_at')
        ->where('users.id', '=', auth()->user()->id)
        ->get();
        return view('layouts.inputPerjalanan',['data'=>$sorted = $data->SortByDesc('created_at')]);
        // dd($data);
    }

    public function SimpanPerjalanan(Request $request){
        // $id = DB::table('users')
        // ->auth()->user()->id
        $data=[
            'tanggal'=>$request->tanggal,
            'waktu'=>$request->waktu,
            'provinsi'=>$request->provinsi,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu,
            'id_user'=>auth()->user()->id,
        ];
        // dd($data);

        Perjalanan::create($data);
        Alert::toast('Perjalanan Tersimpan!','success')->position('top-end');
        return back();
    }

    public function DeletePerjalanan(Request $request){
        $delete = $request->delete;
        $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
        ->Where(function ($query) use($delete) {
                $query->where('users.id', auth()->user()->id)
                        ->where('perjalanans.id',$delete);
        })
        ->get(['perjalanans.*']);

        Perjalanan::destroy($data);
        Alert::toast('Perjalanan Berhasil Di Delete!','success')->position('top-end');
        return back();
        // dd($data);
    }

    public function Perjalanan(){
        if (Auth::check()){
        // $data = Perjalanan::all();
        $data = DB::table('perjalanans')
        ->join('users', 'users.id', '=', 'perjalanans.id_user')
        ->select('users.email', 'perjalanans.id', 'perjalanans.tanggal','perjalanans.waktu','perjalanans.provinsi', 'perjalanans.lokasi', 'perjalanans.suhu')
        ->where('users.id', '=', auth()->user()->id)
        ->get();
        return view('layouts.perjalanan',['data'=>$data]);
    }
    }
    
    public function SearchPerjalanan(Request $request){
        // get data
        if(!empty($request->input('lokasi') && empty($request->input('tanggal','waktu','suhu','provinsi')))){
            $search=$request->lokasi;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.lokasi',$search);
            })
            ->get(['users.id','perjalanans.*']);
        }
        else if(!empty($request->input('provinsi') && empty($request->input('lokasi','waktu','suhu','tanggal')))){
            $search=$request->provinsi;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.provinsi',$search);
            })
            ->get(['users.id','perjalanans.*']);
        }
        else if(!empty($request->input('tanggal') && empty($request->input('lokasi','waktu','suhu','provinsi')))){
            $search=$request->tanggal;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.tanggal',$search);
            })
            ->get(['users.id','perjalanans.*']);
        }
        
        else if(!empty($request->input('waktu') && empty($request->input('lokasi','tanggal','suhu','provinsi')))){
            $search=$request->waktu;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.waktu',$search);
            })
            ->get(['users.id','perjalanans.*']);
        }

        else if(!empty($request->input('suhu') && empty($request->input('lokasi','waktu','tanggal','provinsi')))){
            $search=$request->suhu;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.suhu',$search);
            })
            ->get(['users.id','perjalanans.*']);
        }
        
        else if(!empty($request->input('provinsi'))){
            $search=$request->provinsi;
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($search) {
                    $query->where('users.id', auth()->user()->id)
                            ->where('perjalanans.provinsi',$search);
            })
            ->get(['users.id','perjalanans.*']);
        };

        // condition
        if (count($data)!=0) {
            return view('layouts.perjalanan',['data'=>$data]);
        }else{
            return view('layouts.NotFound');
        }  
    }

}
