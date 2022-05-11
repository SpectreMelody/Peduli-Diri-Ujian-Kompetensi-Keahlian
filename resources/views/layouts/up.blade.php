@extends('sign')

@section('title', 'Register')
@section('title-page', 'Register')
    
@section('content')
<form method="POST" action="/simpanUser" class="needs-validation" novalidate="">
    {{ csrf_field() }}
    
    {{-- bagian notifikasi --}}
    {{-- @if (session('alert'))
    <div class="rounded p-3 mb-3 bg-danger text-white text-center">
      <strong>{{ session('alert') }}</strong>
    </div>

    @elseif ($errors->any())
    <div class="rounded p-3 mb-3 bg-danger text-white text-center">
      @foreach ($errors->all() as $error)
          <strong>{{ $error }}</strong>
      @endforeach
    </div>

    @elseif (session('succes'))
    <div class="rounded p-3 mb-3 bg-success text-white text-center">
      <strong>{{ session('succes') }}</strong>
    </div>
    @endif --}}

    {{-- bagian form --}}
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
      <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" tabindex="2" required autofocus>
      <div class="invalid-feedback">
        Nama Belakang wajib diisi
      </div>
    </div>
  </div>
  </div> --}}

  <div class="form-group">
    <label for="nik">NIK</label>
    <input id="nik" type="text" class="form-control" name="nik" tabindex="3" required autofocus>
    <div class="invalid-feedback">
      NIK wajib diisi
    </div>
  </div>

  <div class="form-group">
    <label for="email">Konfirmasi NIK</label>
    <input id="email" type="text" class="form-control" name="confirm_nik" tabindex="1" required autofocus>
    <div class="invalid-feedback">
      NIK wajib diisi lagi
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-lg btn-block text-white" style="background-color:#77DD76"  tabindex="4">
      Register
    </button>
  </div>
  <div class="mt-5 text-center">
  <a href="/login">Sudah Punya Akun?</a>
  </div>
@endsection