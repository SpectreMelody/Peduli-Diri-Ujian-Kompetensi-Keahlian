@extends('sign')

@section('title', 'Login')
@section('title-page', 'Login')
    
@section('content')
<form method="POST" action="/postLogin" class="needs-validation" novalidate="">
    {{ csrf_field() }}
    
    {{-- @if (session('alert'))
    <div class="rounded p-3 mb-3 bg-danger text-white text-center">
      <strong>{{ session('alert') }}</strong>
    </div>
    @endif --}}

    {{-- <div class="d-flex flex-row"> --}}
      <div class="mr-1">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input id="nama" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
          <div class="invalid-feedback">
            Nama wajib diisi
          </div>
        </div>
      </div>
    
    {{-- <div class="flex-fill">
      <div class="form-group">
        <label for="nama_belakang">Nama Belakang</label>
        <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" tabindex="1" required autofocus>
        <div class="invalid-feedback">
          Nama Belakang wajib diisi
        </div>
      </div>
    </div>
    </div> --}}
  

  <div class="form-group">
    <label for="nik">NIK</label>
    <input id="email" type="password" class="form-control" name="email" tabindex="2" required autofocus>
    <input id="password" type="hidden" class="form-control" name="password" tabindex="2" required autofocus>
    <div class="invalid-feedback">
      NIK wajib diisi
    </div>
  </div>

  <div class="form-group">
    <div class="custom-control custom-checkbox mb-5">
      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
      <label class="custom-control-label" for="remember-me">Remember Me</label>
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-lg btn-block text-white" style="background-color:#77DD76"  tabindex="4">
      Login
    </button>
  </div>

  <div class="mt-5 text-center">
    <a href="/register">Buat Akun?</a>
    </div>

  <script>
    window.onload = function() {
      var src = document.getElementById('email'),
          dst = document.getElementById('password');
      src.addEventListener('input', function(){
        dst.value = src.value;
      });
    };
  </script>

@endsection