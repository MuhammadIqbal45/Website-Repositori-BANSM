@extends('template_admin')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Riwayat Kelompok Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Riwayat Kelompok Admin</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
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
                    <h6>Riwayat Kelompok Admin</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="admin-riwayat-kelompok-asesor" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label>Pilih Periode</label>
                                    <input name="periode" type="text" class="form-control" placeholder="Masukkan Periode" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Nama Kelompok</label>
                                    <input name="nama_kelompok" type="text" class="form-control" placeholder="Masukkan Nama Kelompok" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>NPSN</label>
                                    <input name="npsn" type="text" class="form-control" placeholder="Masukkan NPSN" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Nama Sekolah</label>
                                    <input name="nama_sekolah" type="text" class="form-control" placeholder="Masukkan Nama Sekolah" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan User 1</label>
                                    <select name="user1_id" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan User 2</label>
                                    <select name="user2_id" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Email User 1</label>
                                    <select name="user1_email" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->email }}">{{ $item->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan Email User 2</label>
                                    <select name="user2_email" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->email }}">{{ $item->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan NIA User 1</label>
                                    <select name="user1_username" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->username }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Masukkan NIA User 2</label>
                                    <select name="user2_username" class="form-control">
                                        <option value="NULL">Pilih User</option>
                                        @foreach ($tambahuser as $item)
                                        <option value="{{ $item->username }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <fieldset>
                                        <button type="submit" class="btn btn-primary">Buat Kelompok</button>
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
@endsection