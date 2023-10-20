@extends('template_asesor')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Unduh Dokumen Asesor</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Unduh Dokumen Asesor</h6>
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
                    <h6>Unduh Dokumen Asesor</h6>
                </div>
                @if ($tambahdokumens->count() != 0)
                @foreach($tambahdokumens as $item)
                <div class="card-body pb-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">

                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $item->nama_dokumen }}</h6>
                                <span class="text-xs">{{ $item->created_at }}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a href="{{ asset('dokumen/unggah dokumen/'. $item ->file_dokumen) }}"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true" style="color: red;"></i><button class="btn btn-link text-sm mb-0 px-0 ms-1" style="color: red;">Unduh</button></a>
                                <!-- <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button> -->
                            </div>

                        </li>
                    </ul>
                </div>
                @endforeach
                @else
                <div class="card-body pb-2">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-center ps-0 border-radius-lg">
                            <h6 class="mb-6 m-6 text-dark font-weight-bold text-sm">Dokumen Kosong</h6>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="card-header pb-0">
                    <div class="tm-table-mt tm-table-actions-row">
                        <div class="box-footer">
                            {{-- <div class="box-body"> --}}
                            {!! $tambahdokumens->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection