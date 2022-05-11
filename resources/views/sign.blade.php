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
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{asset('')}}assets/img/logo_Peduli Diri_Transparent.png" alt="logo" width="80" class="shadow-light rounded-circle mb-4 mt-2">
            <h4 class="font-weight-normal mb-5" style="color:#77DD76">@yield('title-page')</h4>
            @yield('content')
          </div>
          
        </div>
        <div class="col-lg-8 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{asset('')}}assets/img/unsplash/JaTim.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-3 pb-2">
                <h1 class="mb-2 display-4 font-weight-bold">Welcome to <br> <span style="color:#77DD76"> Peduli Diri</span></h1>
                <h5 class="font-weight-normal text-muted-transparent">Website Catatan Perjalanan</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('sweetalert::alert')
</body>
</html>
