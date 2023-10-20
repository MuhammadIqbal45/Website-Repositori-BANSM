@extends('template_asesor')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Beranda Asesor</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Beranda Asesor</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <!-- <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-3">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ auth()->user()->name }}</span>
                            </a>
                        </li> -->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-white font-weight-bold px-3" style="color: white;" id="date"></a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-white font-weight-bold px-3" style="color: white;" id="clock"></a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid py-4">
    <div class="row">
        <!-- <div class="col-md-3">
            <div class="card card-profile">
                <img src="adminargon/assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n5 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <img src="adminargon/assets/img/ban.png" class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center mt-4">
                        <div class="h6 font-weight-300" style="font-weight: bold;">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; color: cornflowerblue;">
                            {{ auth()->user()->level }}
                        </div>
                        <div class="h6 font-weight-300">
                            <a class="btn btn-danger" href="asesor-ganti-password"><i class="fa fa-book"></i> Perubahan Password</a>
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold;">
                            <i class="fa fa-drivers-license-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>NIA. {{ auth()->user()->username }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold;">
                            <i class="fa fa-envelope-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        @foreach($tambahkelompok as $item)
        <div class="col-md-3 mt-3">
            <div class="card card-profile">
                <img src="adminargon/assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n5 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <img src="adminargon/assets/img/ban.png" class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-left mt-4">
                        <div class="text-center">
                            <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                                {{ $item->user1_id }}
                            </div>
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-drivers-license-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>NIA. {{ $item->user1_username }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-envelope-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $item->user1_email }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-phone"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $item->user1_no_telfon }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($tambahkelompok as $item)
        <div class="col-md-3 mt-3">
            <div class="card card-profile">
                <img src="adminargon/assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n5 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <img src="adminargon/assets/img/ban.png" class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-left mt-4">
                        <div class="text-center">
                            <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                                {{ $item->user2_id }}
                            </div>
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-drivers-license-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>NIA. {{ $item->user2_username }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-envelope-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $item->user2_email }}
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold; font-size: 80%;">
                            <i class="fa fa-phone"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $item->user2_no_telfon }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-lg-6 mt-3">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Laporan Individu</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @if ($tambahasesmens->count() != 0)
                        @foreach ($tambahasesmens as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Laporan Asesmen</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->username}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-asesmen">
                                    <h6 class="mb-1 text-dark text-sm">Laporan telah dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <h6 class="mb-1 text-dark text-sm">Laporan Asesmen</h6>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-asesmen">
                                    <h6 class="mb-1 text-sm" style="color: red;">Laporan belum dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if ($tambahperjalananvisitasis->count() != 0)
                        @foreach ($tambahperjalananvisitasis as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Laporan Perjalanan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->username}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <h6 class="mb-1 text-dark text-sm">Laporan telah dikirim</h6>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <h6 class="mb-1 text-dark text-sm">Laporan Perjalanan Visitasi</h6>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-perjalanan-visitasi">
                                    <h6 class="mb-1 text-sm" style="color: red;">Laporan belum dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if ($tambahpenginapanvisitasis->count() != 0)
                        @foreach ($tambahpenginapanvisitasis as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Laporan Penginapan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->username}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <h6 class="mb-1 text-dark text-sm">Laporan telah dikirim</h6>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <h6 class="mb-1 text-dark text-sm">Laporan Penginapan Visitasi</h6>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-penginapan-visitasi">
                                    <h6 class="mb-1 text-sm" style="color: red;">Laporan belum dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if ($tambahdokumenvisitasis->count() != 0)
                        @foreach ($tambahdokumenvisitasis as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Laporan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->username}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <h6 class="mb-1 text-dark text-sm">Laporan telah dikirim</h6>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <h6 class="mb-1 text-dark text-sm">Laporan Visitasi</h6>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-visitasi">
                                    <h6 class="mb-1 text-sm" style="color: red;">Laporan belum dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if ($tambahvalidasis->count() != 0)
                        @foreach ($tambahvalidasis as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Laporan Validasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->username}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <h6 class="mb-1 text-dark text-sm">Laporan telah dikirim</h6>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <h6 class="mb-1 text-dark text-sm">Laporan Validasi</h6>

                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="asesor-laporan-validasi">
                                    <h6 class="mb-1 text-sm" style="color: red;">Laporan belum dikirim</h6>
                                </a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Pengumuman</h6>
                </div>

                <div class="card-body pt-2 p-3">
                    <ul class="list-group">
                        @if ($tambahpengumumans->count() != 0)
                        @foreach ($tambahpengumumans as $item)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-2 text-sm" style="color: red; font-weight: bold;">{{ $item->subject }}</h6>
                                <h6 class="mb-3 text-xs">{{ $item->created_at }}</h6>
                                <h6 class="mb-3 text-xs">{{ $item->content }}</h6>
                                @if ($item->attachment != null)
                                <h6 class="mb-2 text-xs"><a href="{{ asset('mail/'. $item ->attachment) }}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a></h6>
                                @endif
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li class="list-group-item border-0 d-flex justify-content-center ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-6 m-6 text-dark font-weight-bold text-sm">Pengumuman Kosong</h6>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="card-header pb-0">
                    <div class="tm-table-mt tm-table-actions-row">
                        <div class="box-footer">
                            {{-- <div class="box-body"> --}}
                            {!! $tambahpengumumans->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection