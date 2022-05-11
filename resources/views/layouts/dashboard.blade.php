@extends('master')

@section('title', 'Dashboard')
@section('data','DASHBOARD')
@section('page','Dashboard')

@section('content')
{{-- @include('layouts.data.imgprovinsi') --}}
<head>
    @php
        use App\Models\User;
        $provinsiActive = array("Aceh","Banten","Bali");
        $provinsi1 = array("Bengkulu","DI Yogyakarta","DKI Jakarta");
        $provinsi2 = array("Gorontalo","Jambi","Jawa Barat");
        $provinsi3 = array("Jawa Tengah","Jawa Timur","Kalimantan Barat");
        $provinsi4 = array("Kalimantan Tengah","Kalimantan Timur","Kalimantan Selatan");
        $provinsi5 = array("Kalimantan Utara","Kepulauan Bangka Belitung","Kepulauan Riau");
        $provinsi6 = array("Lampung","Maluku","Maluku Utara");
        $provinsi7 = array("Nusa Tenggara Barat","Nusa Tenggara Timur","Papua");
        $provinsi8 = array("Papua Barat","Riau","Sulawesi Barat");
        $provinsi9 = array("Sulawesi Selatan","Sulawesi Tengah","Sulawesi Tenggara");
        $provinsi10 = array("Sulawesi Utara","Sumatera Barat","Sumatera Selatan");
        $provinsi11 = array("Sumatera Utara");
        function counts($condition){
            $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
            ->Where(function ($query) use($condition){
                $query  
                ->where('users.id', auth()->user()->id)
                ->where('perjalanans.provinsi', $condition);
            })->get(['users.id', 'perjalanans.provinsi']);
            $tcount = count($data);
            return $tcount;
        }
    @endphp

    <style>
        .zoom{
            transition: 0.2s;
        }
        .zoom:hover{
            transform:scale(1.05); 
        }

        @media screen and (min-width: 897px) {
            .sizing {
            width:27%;
            }
        }

        @media screen and (max-width: 896px) {
            .sizing {
            width:75%;
            }
        }

        .carousel-control-prev, .carousel-control-next {
                height: 44px;
                width: 40px;
                background: #87dd86;	
                margin: auto 0;
                border-radius: 4px;
                opacity: 0.8;
            }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: #77DD76;
            opacity: 1;
        }
        .carousel-control-prev i, .carousel-control-next i {
            font-size: 36px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -19px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: #fff;
            text-shadow: none;
            font-weight: bold;
        }
        .carousel-control-prev i {
            margin-left: -2px;
        }
        .carousel-control-next i {
            margin-right: -4px;
        }		

        
    </style>
</head>
<div class="container-xl">
    <div class="row">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="row d-flex">
                            @foreach ($provinsiActive as $listimgActive)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimgActive}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimgActive}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimgActive}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimgActive}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimgActive}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimgActive}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimgActive)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>    
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi1 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi2 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi3 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi4 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi5 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi6 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi7 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi8 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi9 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row d-flex">
                            @foreach ($provinsi10 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row col-sm-5">
                            @foreach ($provinsi11 as $listimg)
                                <div class="p-2 mb-3 mt-3 ml-2 mr-2 flex-fill align-items-center text-center sizing" >
                                    <form method="GET" action="/search" style="width:100%;">
                                    @csrf
                                    <button class="btn zoom" type="submit" value="{{$listimg}}" name="provinsi" style="width: 100%; border-top-left-radius: 35px; border-top-right-radius: 35px; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px;">
                                    <img 
                                    class="lazy"
                                    loading="lazy" 
                                    src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-src="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp" 
                                    data-srcset="{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 2x,{{asset('')}}assets/img/img_assets/{{$listimg}}.webp 1x" 
                                    style="height:200px; width:100%; border-top-left-radius: 35px; border-top-right-radius: 35px;"
                                    >
                                    <div class="card card-gray d-flex flex-column" style="height:47px; width:100%; margin-bottom:0rem; flex-flow: column-wrap; border-bottom-left-radius: 35px; border-bottom-right-radius: 35px; background-color:#77DD76">   
                                        <h6 class="flex-fill" style="color:#f9f9f9; margin-top:2px; margin-bottom:0rem;">{{$listimg}}</h6>
                                        <p class="flex-fill" style="color:#f9f9f9; margin-bottom:0rem;">Data Perjalanan &#9679; {{counts($listimg)}} Catatan</p>
                                    </div>
                                    </button>
                                    </form>
                                </div>	
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
</div>
@endsection

                        		