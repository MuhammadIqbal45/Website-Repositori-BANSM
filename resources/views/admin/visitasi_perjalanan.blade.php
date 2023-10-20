@extends('template_admin')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Laporan Perjalanan Visitasi Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Laporan Perjalanan Visitasi Admin</h6>
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
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Laporan Perjalanan Visitasi Admin</h6>
                </div>
                <div class="card-header d-flex flex-row gap-3">
                    <form action="admin-laporan-perjalanan-visitasi" method="GET">
                        <input name="search" type="text" class="form-control" placeholder="Cari">
                    </form>
                    <a class="btn btn-primary" href="admin-laporan-penginapan-visitasi">
                        Lanjut Ke Laporan Penginapan Visitasi
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Keberangkatan</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Tiba</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi Asal</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi Tujuan</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Biaya</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hapus</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php $no = 0; ?>
                            @foreach ($tambahvisitasis as $item)
                            <?php $no++; ?>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $no }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->waktu_berangkat }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->waktu_tiba }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->lokasi_asal }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->lokasi_tujuan }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->total_biaya }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->username }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->created_at }}</span></th>
                                    <th></th>
                                    <th class="align-middle">
                                        <a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ url('admin-hapus-laporan-perjalanan-visitasi', $item->id)}}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</a>
                                    </th>
                                    <th></th>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-header pb-0">
                    <div class="tm-table-mt tm-table-actions-row">
                        <div class="box-footer">
                            {{-- <div class="box-body"> --}}
                            {!! $tambahvisitasis->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection