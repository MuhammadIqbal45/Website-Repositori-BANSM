@extends('template_admin')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Beranda Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Beranda Admin</h6>
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
        <!-- <div class="col-md-3 mt-3">
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
                            <a class="btn btn-danger" href="admin-ganti-password"><i class="fa fa-book"></i> Perubahan Password</a>
                        </div>
                        <div class="h6 font-weight-300" style="font-weight: bold;">
                            <i class="fa fa-envelope-o"></i>
                            <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Laporan Keseluruhan</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($count_ketersediaans as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Ketersediaan Asesor</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->ketersediaans}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-ketersediaan"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_dokumens as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Unggah Dokumen</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->dokumens}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-unggah-dokumen"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_pengumumen as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah pengumuman</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->pengumumen}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-pengumuman"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_kritiks as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Kritik dan Saran</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->kritiks}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-kritik-dan-saran"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Laporan Keseluruhan</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($count_users_admin as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah User Admin</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->users}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-pengguna"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_users_asesor as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah User Asesor</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->users}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-pengguna"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_users_sekolah as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah User Sekolah</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->users}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-pengguna"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_kelompok_asesors as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Kelompok Asesor</h6>
                                    <span class="text-xs">Jumlah saat ini : {{$item->kelompok_asesors}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-riwayat-kelompok-asesor"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Laporan Keseluruhan</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($count_asesmen_dokumens as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Laporan Asesmen</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->asesmen_dokumens}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-laporan-asesmen"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_visitasi_perjalanans as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Laporan Perjalanan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->visitasi_perjalanans}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-laporan-perjalanan-visitasi"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_visitasi_penginapans as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Laporan Penginapan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->visitasi_penginapans}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-laporan-penginapan-visitasi"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_visitasi_dokumens as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Laporan Visitasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->visitasi_dokumens}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-laporan-visitasi"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($count_validasi_dokumens as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Jumlah Laporan Validasi</h6>
                                    <span class="text-xs">Jumlah yang telah dilaporkan : {{$item->validasi_dokumens}}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="admin-laporan-validasi"><i class="text-lg me-1" aria-hidden="true"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1">Lihat</button></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card card-profile">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.331376683021!2d112.72194141456141!3d-7.316622094719569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb85d06db2e7%3A0x7a2f07fea23c6982!2sBAN-S%2FM%20Provinsi%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1678378931380!5m2!1sen!2sid" width="100%" height="443" class="card-img-top" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div> -->
    </div>
</div>

@endsection