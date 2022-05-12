@extends('master')

@section('title', 'Perjalanan')
@section('data','DATA PERJALANAN')
@section('page','Data Page')


@section('content')
@php
$no = 1
@endphp

<table class="table table-borderless table-light" id="myTable">
  <thead>
    <tr>
        <th scope="col" style="width:10px;">No.</th>
        <th scope="col" >Tanggal</th>
        <th scope="col" >Waktu</th>
        <th scope="col" >Provinsi</th>
        <th scope="col" >Lokasi</th>
        <th scope="col" >Suhu</th>
        <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($data as $item)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $item->tanggal }}</td>
      <td>{{ $item->waktu }}</td>
      <td>{{ $item->provinsi }}</td>
      <td>{{ $item->lokasi }}</td>
      <td>{{ $item->suhu }}℃</td>
     
      <td style="text-align: center;">
        {{-- edit action --}}
            <button data-toggle="modal" data-target="#editModal{{ $item->id }}" class="btn btn-warning align-center" style="color:#fff; :75px; height:35px;">
              <i class="fa fa-cog" aria-hidden="true"></i> 
            </button>
          {{-- edit modal --}}
            <div class="modal fade" style ="transform: translateY(10%);" data-backdrop="false" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="z-index:1041;" role="document">
                <div class="modal-content align-items-center" style="z-index:1042;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Edit Data Ini?<br>
                      <i><span style="font-size: 15px;">~Ganti Data yang ingin Di Edit saja!~</span></i>
                    </h5>
                  </div>
                  <div class="modal-body col-12 col-lg-9 text-left">

                    <form method="POST" action="/editPerjalanan" class="needs-validation" novalidate="">
                      {{ csrf_field() }}
                      <div class="d-flex flex-row">
                        <div class="form-group flex-fill mr-1">
                          <label>Tanggal</label>
                          <input type="date" class="form-control" value="{{ $item->tanggal }}" style="text-align: center;" name="tanggal" tabindex="1" required autofocus>    
                        </div>
              
                        <div class="form-group flex-fill">
                          <label>Waktu</label>
                          <input type="time" class="form-control"  value="{{ $item->waktu }}" style="text-align: center;" name="waktu" tabindex="1" required autofocus>    
                        </div>
                      </div>
              
                      <div class="d-flex flex-row">
                        <div class="form-group flex-fill mr-1">
                          <label>Provinsi</label>
                          <select class="form-control" style="text-align: center;" name="provinsi" tabindex="1" required autofocus>
                            <option value="{{ $item->provinsi }}" selected>{{ $item->provinsi }}</option>
                            @include('layouts.data.editProvinsi')   
                          </select>
                        </div>
              
                        <div class="form-group" style="width:37%">
                          <label>Suhu</label>
                          <div class="input-group">
                            <input type="number" class="form-control" value="{{ $item->suhu }}" style="text-align: center;" min="16" max="48" name="suhu" tabindex="1" required autofocus>
                            <div class="input-group-append">
                              <span class="input-group-text">℃</span>
                            </div>
                          </div>
                        </div>
                      </div>
              
                      <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" value="{{ $item->lokasi }}" name="lokasi" tabindex="1" required autofocus>  
                      </div>
              
                      <div class="form-group d-flex">
                        <button type="submit" name="edit" value="{{ $item->id }}" class="btn btn-lg btn-block text-white flex-fill" style="background-color:#77DD76" tabindex="4">
                          Save
                        </button>
                        <button class="btn btn-light flex-fill ml-2" type="button" data-dismiss="modal">Back</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

        {{-- delete action --}}
            <button data-toggle="modal" data-target="#deleteModal{{ $item->id}}" class="btn btn-danger align-center" style="color:#fff; :75px; height:35px;">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          {{-- delete modal --}}
            <div class="modal fade" style ="transform: translateY(10%);" data-backdrop="false" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="z-index:1041;" role="document">
                <div class="modal-content align-items-center" style="z-index:1042;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Delete Data Ini?</h5>
                  </div>
                  <div class="modal-body">Data Akan di delete secara Permanent dari akun anda!</div>
                  <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Back</button>
                    <form method="POST" action="/deletePerjalanan" class="needs-validation">
                      {{-- @method('delete') --}}
                      {{ csrf_field() }}
                      <button name="delete" id="delete" class="btn btn-danger align-center" type="submit" value="{{ $item->id }}" style="color:#fff; :75px; height:35px;">
                        Delete
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </td>
    </tr>
    @endforeach
  </tbody>
<table>

{{-- <script>
  var table = document.getElementById("myTable");
  $(document).ready(function() {
        $('#myTable').paging({limit:5});
  });
  
  function sortTable(n) {
    var rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    switching = true;
    dir = "asc"; 

    while (switching) {
      switching = false;
      rows = table.rows;

      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];

        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }

      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;    
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true; 
        }
      }
    }
  }

  function nomor() {
    var no = 1;
    for (r = 1; r<=(table.rows.length); r++){
        table.rows[r].cells[0].innerHTML = no++;
    }
  }

  
</script> --}}

<script>
  $(document).ready(function() {
    var t = $('#myTable').DataTable( {
        'searching' : false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        {
          "targets": [3,4,6],
          "orderable": false,
        }],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
            this.data(i++);
        } );
    } ).draw();
  } );
</script>

<style>
  .page-item.active .page-link {
    background-color: #77DD76;
    border-color: #77DD76;
  }

  .page-item.disabled .page-link {
    color: #77DD76;
  }

  .page-item .page-link{
    color:#77DD76;
  }

  .page-item .page-link:hover{
    background-color:#77DD76;
    color: #fff;
  }

  .dataTables_length{
    display: none;
  }
</style>


@endsection