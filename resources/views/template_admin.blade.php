<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/adminargon/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/adminargon/assets/img/ban.png">
    <title>
        Repositori BAN-S/M - Admin
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/adminargon/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/adminargon/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/adminargon/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/adminargon/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
    <link href="/adminargon/assets/css/select2.min.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    @if (Auth::check() && !Auth::user()->email_verified_at)
    <div class="alert alert-danger mb-n1 text-center" role="alert" style="color: white;">
        Anda belum verifikasi email,
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">Verifikasi sekarang</button>.
        </form>
    </div>
    @endif
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-6 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="admin-beranda">
                <img src="/adminargon/assets/img/ban.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Repositori BAN-S/M</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin-beranda">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-ketersediaan">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-check-square text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Form ketersediaan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-unggah-dokumen">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cloud-download-95 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Unggah Dokumen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-laporan-asesmen">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Dokumen Asesmen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-laporan-perjalanan-visitasi">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Perjalanan Visitasi</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="admin-laporan-penginapan-visitasi">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Penginapan Visitasi</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="admin-laporan-visitasi">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Dokumen Visitasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-laporan-validasi">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Dokumen Validasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-pengumuman">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-kritik-dan-saran">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-satisfied text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kritik dan Saran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-riwayat-kelompok-asesor">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Riwayat Kelompok Asesor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-pengguna">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin-akun">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-sign-out text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Kami telah mengirimkan link verifikasi pada email anda.
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <div class="container-fluid py-4">
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                Copyright © <script>
                                    document.write(new Date().getFullYear())
                                </script> BAN-S/M Jatim.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="/adminargon/assets/js/core/popper.min.js"></script>
    <script src="/adminargon/assets/js/core/bootstrap.min.js"></script>
    <script src="/adminargon/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/adminargon/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/adminargon/assets/js/plugins/chartjs.min.js"></script>
    <script type="text/javascript">
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 24) {
                a_p = "PM";
            } else {
                a_p = "AM";
            }
            if (curr_hour == 0) {
                curr_hour = 24;
            }
            if (curr_hour > 24) {
                curr_hour = curr_hour - 24;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
    </script>
    <!-- Menampilkan Hari, Bulan dan Tahun -->
    <script type='text/javascript'>
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        document.getElementById('date').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    </script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/adminargon/assets/js/argon-dashboard.min.js?v=2.0.2"></script>
    <!-- <script src="/ckeditor5-build-classic/ckeditor.js"></script>
    @yield('ckeditor5') -->
    @yield('select2')
    <script src="/adminargon/assets/js/jquery.min.js"></script>
    <script src="/adminargon/assets/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
    @include('sweetalert::alert')
    <!-- @yield('chart') -->
</body>

</html>