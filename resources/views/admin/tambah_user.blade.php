@extends('template_admin')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pengguna Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Pengguna Admin</h6>
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
                    <h6>Pengguna BAN-S/M</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('simpanregistrasi') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Nama</label>
                                    <input name="name" type="text" class="form-control" aria-label="name" placeholder="Masukkan Nama" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Email</label>
                                    <input name="email" type="email" class="form-control" aria-label="email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Username</label>
                                    <input name="username" type="text" class="form-control" aria-label="username" placeholder="Masukkan username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan No Telfon</label>
                                    <input name="no_telfon" type="text" class="form-control" aria-label="no_telfon" placeholder="Masukkan No Telfon">

                                    @error('no_telfon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Alamat</label>
                                    <input name="alamat" type="text" class="form-control" aria-label="alamat" placeholder="Masukkan Alamat">

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Level</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control col-xl-12 col-lg-8 col-md-8 col-sm-7" aria-label="level" name="level" data-live-search="true" tabindex="-98" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                            <option selected="">--Masukkan Level--</option>
                                            <option value="ADMIN">Admin</option>
                                            <option value="ASESOR">Asesor</option>
                                            <option value="SEKOLAH">Sekolah</option>
                                        </select>

                                        @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Konfirmasi Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan Konfirmasi Password">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <fieldset>
                                        <button type="submit" class="btn btn-primary">Tambah User</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection