@extends('template_asesor')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Akun</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Akun</h6>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Edit Akun</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan-perubahan-akun-asesor') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label>Nama</label>
                                <input value="{{ $user->name }}" name="name" type="text" class="form-control" aria-label="name" placeholder="Nama" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Email</label>
                                <input value="{{ $user->email }}" name="email" type="email" class="form-control" aria-label="email" placeholder="Email" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Username</label>
                                <input value="{{ $user->username }}" name="username" type="text" class="form-control" aria-label="username" placeholder="username" disabled>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>No Telfon</label>
                                <input value="{{ $user->no_telfon }}" name="no_telfon" type="text" class="form-control" aria-label="no_telfon" placeholder="No Telfon">

                                @error('no_telfon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Alamat</label>
                                <input value="{{ $user->alamat }}" name="alamat" type="text" class="form-control" aria-label="alamat" placeholder="Alamat">

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <fieldset>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                    <form action="asesor-ganti-password" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label>Masukkan Password Lama</label>
                                <input name="current_password" id="current_password" type="password" class="form-control" aria-label="current_password" placeholder="Masukkan Password Lama" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Masukkan Password Baru</label>
                                <input name="password" id="password" type="password" class="form-control" aria-label="password" placeholder="Masukkan Password Baru" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-md-12 mt-3">
                                <fieldset>
                                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection