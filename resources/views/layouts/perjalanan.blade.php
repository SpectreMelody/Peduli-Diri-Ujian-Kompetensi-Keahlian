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
        <th scope="col" >Action</th>
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
      <td>
        <form method="POST" action="/deletePerjalanan" class="needs-validation">
          {{-- @method('delete') --}}
          {{ csrf_field() }}
          <button name="delete" id="delete" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger align-center" type="submit" value="{{ $item->id }}" style="color:#fff; :75px; height:35px;">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </form>
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