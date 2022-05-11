<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function Dashboard(){
        if (Auth::check()){
        return view('layouts.dashboard');
    }
    }
}
