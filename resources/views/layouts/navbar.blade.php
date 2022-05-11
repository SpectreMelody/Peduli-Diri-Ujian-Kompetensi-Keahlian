<form class="form-inline mr-auto" method="GET" action="/search">
    @csrf

    <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>

    <div class="col-auto form-group">
        <select onchange="yesnoCheck(this);" class="form-control form-select" type="search">
            <option value="lokasi">Lokasi</option>
            <option value="provinsi">Provinsi</option>
            <option value="tanggal">Tanggal</option>
            <option value="waktu">Waktu</option>
            <option value="suhu">Suhu</option>
        </select>
    </div>

    <div class="search-element">
        <div style="display:block;" id='id_lokasi'>
            <input required id="lokasi" class="form-control" style="text-align: center;" type="search" placeholder="Search" aria-label="search" data-width="250" name="lokasi">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>

        <div style="display:none;" id='id_provinsi'>
            <select id="provinsi" class="form-control"  style="text-align: center;" type="search"  aria-label="search" data-width="250" tabindex="1" name="provinsi">
            @include('layouts.data.provinsi')
            </select>
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>

        <div style="display:none;" id='id_tanggal'>
            <input id="tanggal" class="form-control" style="text-align: center;" type="date" placeholder="Search" aria-label="search" data-width="250" name="tanggal">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>

        <div style="display:none;" id="id_waktu">
            <input id="waktu" class="form-control" style="text-align: center;" type="time" placeholder="Search" aria-label="search" data-width="250" name="waktu">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>

        <div style="display:none;" id="id_suhu">
            <input id="suhu" class="form-control" style="text-align: center;" type="number" placeholder="Suhu" aria-label="search" data-width="250" name="suhu">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
    </div>
</form>

<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="../assets/img/avatar/avatar-6.png" class="rounded-circle mr-1" style="boder">
    <div class="d-sm-none d-lg-inline-block">Hi,
    @if (!empty(auth()->user()->nama))
    {{auth()->user()->nama}}
    @else
    User!    
    @endif
    </div></a>
    {{-- <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div> --}}
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
          Logout
        </a>
    </div>
    </li>
</ul>

<script>
    function yesnoCheck(that) {
        if (that.value == "lokasi") {
            document.getElementById("id_lokasi").style.display = "block";
            document.getElementById("id_tanggal").style.display = "none";
            document.getElementById("id_waktu").style.display = "none";
            document.getElementById("id_suhu").style.display = "none";
            document.getElementById("id_provinsi").style.display = "none";

            document.getElementById("tanggal").value = "";
            document.getElementById("waktu").value = "";
            document.getElementById("suhu").value = "";
            document.getElementById("provinsi").value = "";

            document.getElementById("tanggal").required = false;
            document.getElementById("lokasi").required = true;
            document.getElementById("waktu").required = false;
            document.getElementById("suhu").required = false;
            document.getElementById("provinsi").required = false;
        }
        else if (that.value == "provinsi") {
            document.getElementById("id_lokasi").style.display = "none";
            document.getElementById("id_tanggal").style.display = "none";
            document.getElementById("id_waktu").style.display = "none";
            document.getElementById("id_suhu").style.display = "none";
            document.getElementById("id_provinsi").style.display = "block";

            document.getElementById("tanggal").value = "";
            document.getElementById("waktu").value = "";
            document.getElementById("suhu").value = "";
            document.getElementById("lokasi").value = "";

            document.getElementById("tanggal").required = false;
            document.getElementById("lokasi").required = false;
            document.getElementById("waktu").required = false;
            document.getElementById("suhu").required = false;
            document.getElementById("provinsi").required = true;
        }
        else if (that.value == "tanggal") {
            document.getElementById("id_lokasi").style.display = "none";
            document.getElementById("id_tanggal").style.display = "block";
            document.getElementById("id_waktu").style.display = "none";
            document.getElementById("id_suhu").style.display = "none";
            document.getElementById("id_provinsi").style.display = "none";

            document.getElementById("lokasi").value = "";
            document.getElementById("waktu").value = "";
            document.getElementById("suhu").value = "";
            document.getElementById("provinsi").value = "";

            document.getElementById("tanggal").required = true;
            document.getElementById("lokasi").required = false;
            document.getElementById("waktu").required = false;
            document.getElementById("suhu").required = false;
            document.getElementById("provinsi").required = false;
        }
        else if (that.value == "waktu") {
            document.getElementById("id_lokasi").style.display = "none";
            document.getElementById("id_tanggal").style.display = "none";
            document.getElementById("id_waktu").style.display = "block";
            document.getElementById("id_suhu").style.display = "none";
            document.getElementById("id_provinsi").style.display = "none";

            document.getElementById("tanggal").value = "";
            document.getElementById("lokasi").value = "";
            document.getElementById("suhu").value = "";
            document.getElementById("provinsi").value = "";

            document.getElementById("tanggal").required = false;
            document.getElementById("lokasi").required = false;
            document.getElementById("waktu").required = true;
            document.getElementById("suhu").required = false;
            document.getElementById("provinsi").required = false;
        }
        else if (that.value == "suhu") {
            document.getElementById("id_lokasi").style.display = "none";
            document.getElementById("id_tanggal").style.display = "none";
            document.getElementById("id_waktu").style.display = "none";
            document.getElementById("id_suhu").style.display = "block";
            document.getElementById("id_provinsi").style.display = "none";

            document.getElementById("tanggal").value = "";
            document.getElementById("waktu").value = "";
            document.getElementById("lokasi").value = "";
            document.getElementById("provinsi").value = "";

            document.getElementById("tanggal").required = false;
            document.getElementById("lokasi").required = false;
            document.getElementById("waktu").required = false;
            document.getElementById("suhu").required = true;
            document.getElementById("provinsi").required = false;
        }
    }
</script>