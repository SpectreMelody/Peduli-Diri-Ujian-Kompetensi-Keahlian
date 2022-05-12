<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; Peduli Diri</title>
  @include('assetsStyle.style')
</head>
<body class="custom-scrollbar-css">
  <div id="app">
      {{-- Navbar --}}
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color:#77DD76"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.navbar')
        </nav>
    </div>
      
      {{-- Sidebar --}}
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            @include('layouts.sidebar')
        </aside>
    </div>

      {{-- Content --}}
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h4>@yield('page')</h4>
          </div>
          <div class="section-body">
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 style="color:#77DD76">@yield('data')</h4>
                </div>
                <div class="card-body">
                       @yield('content')    
                </div>
              </div> 
        </section>
      </div>
    </div>
  </div>
  {{-- logout modal --}}
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin Logout?</h5>
        </div>
        <div class="modal-body">Anda harus memasukkan kembali data akun anda pada halaman Login apabila anda memutuskan untuk Logout. </div>
        <div class="modal-footer">
          <button class="btn btn-light" type="button" data-dismiss="modal">Back</button>
          <a class="btn btn-danger" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
      Logout
    </a>
  </div> --}}
  @include('sweetalert::alert')
</body>
</html>
