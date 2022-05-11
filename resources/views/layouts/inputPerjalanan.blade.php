@extends('master')

@section ('title', 'Input Perjalanan')
@section('data','INPUT')
@section('page','Input Page')

@section('content')
@php
    $i=1

@endphp
<div class="d-flex">
  <section class='flex-fill'>
    <div class="card-body col-12 col-lg-9">
      <form method="POST" action="/simpanPerjalanan" class="needs-validation" novalidate="">
        {{ csrf_field() }}
        <div class="d-flex flex-row">
          <div class="form-group flex-fill mr-1">
            <label>Tanggal</label>
            <input type="date" class="form-control"  style="text-align: center;" name="tanggal" tabindex="1" required autofocus>    
          </div>

          <div class="form-group flex-fill">
            <label>Waktu</label>
            <input type="time" class="form-control"  style="text-align: center;" name="waktu" tabindex="1" required autofocus>    
          </div>
        </div>

        <div class="d-flex flex-row">
          <div class="form-group flex-fill mr-1">
            <label>Provinsi</label>
            <select class="form-control"  style="text-align: center;" name="provinsi" tabindex="1" required autofocus>
            @include('layouts.data.provinsi')   
            </select>
          </div>

          <div class="form-group" style="width:37%">
            <label>Suhu</label>
            <div class="input-group">
              <input type="number" class="form-control"  style="text-align: center;" name="suhu" tabindex="1" required autofocus>
              <div class="input-group-append">
                <span class="input-group-text">℃</span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Lokasi</label>
          <input type="text" class="form-control" name="lokasi" tabindex="1" required autofocus>  
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-block text-white" style="background-color:#77DD76" tabindex="4">
            Save
          </button>
        </div>
      </form>
    </div>
  </section>
  <section class='flex-fill' width="50%">
    <div class="card-body col-12 col-lg-9" style="text-align: center; background-color:#fdfdff; border-color:#e4e6fc; border-width:1px; border-radius:7px; border-style: solid;">
      <h4>Aktivitas Terakhir</h4>
      <ul>
        @foreach($data as $timestamp)
          @if ($i <= 10)
            <li>{{$timestamp->created_at}}</li>
          @endif
          @php
                $i= $i + 1
          @endphp
        @endforeach
      </ul>
    </div>
  </section>
</div>
@endsection