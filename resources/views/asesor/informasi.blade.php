@extends('template_asesor')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Informasi Asesor</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Informasi Asesor</h6>
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
                    <h6>Informasi Asesor</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="asesor-informasi" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label>Email Penerima</label>
                                    <input name="email" type="text" class="form-control" placeholder="Masukkan Email Penerima" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Subjek</label>
                                    <input name="subjek" type="text" class="form-control" placeholder="Masukkan Subjek" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label>Informasi</label>
                                    <textarea rows="6" cols="50" name="informasi" type="text" class="form-control" placeholder="Masukkan Informasi" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>File Dokumen</label>
                                    <div class="custom-file" data-text="Select your file!">
                                        <input class="form-control" name="file_dokumen" placeholder="Upload Dokumen" type="file">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <fieldset>
                                        <button type="submit" class="btn btn-primary">Buat Informasi</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header d-flex">
                    <form action="asesor-informasi" method="GET">
                        <input name="search" type="text" class="form-control" placeholder="Cari">
                    </form>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Email</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subjek</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Dokumen</th>
                                    <th></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Informasi</th>
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
                            @foreach ($tambahinformasis as $item)
                            <?php $no++; ?>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $no }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->email }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->subjek }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold"><a href="{{ asset('dokumen/informasi/'. $item ->file_dokumen) }}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a></span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->informasi }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->username }}</span></th>
                                    <th></th>
                                    <th><span class="text-xs font-weight-bold">{{ $item->created_at }}</span></th>
                                    <th></th>
                                    <th class="align-middle">
                                        <a class="btn btn-link text-danger text-gradient px-0 mb-0" href="{{ url('asesor-hapus-informasi', $item->id)}}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</a>
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
                            {!! $tambahinformasis->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @section('ckeditor5')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection -->