<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Home</title>
    <!-- Favicon -->
    <link href="{{ url('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ url('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="/pemesanan/main_pemesanan">
            <div class="p-3 mb-2 bg-gradient-primary text-white">
                CINEMATIXX
            </div>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ url('assets/img/theme/adminlogo.png') }}">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a class="navbar-brand pt-0" href="/pemesanan/main_pemesanan">
                            <div class="p-3 mb-2 bg-gradient-primary text-white">
                                CINEMATIXX
                            </div>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/pemesanan/main_pemesanan">
                        <i class="ni ni-tv-2 text-primary"></i> Menu Pemesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pemesanan/main_pemesanan/pemesanan_add">
                        <i class="ni ni-basket text-red"></i> Pemesanan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
               href="/pemesanan/main_pemesanan">Home</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ url('assets/img/theme/adminlogo.png') }}">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>

    {{--    TAMBAH DATA--}}

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tambah Data</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <form action="/pemesanan/main_pemesanan/pemesanan_storedata" method="post"
                              enctype="multipart/form-data">
                            <table class="table align-items-center table-flush">
                                {{ csrf_field() }}

                                <tr>
                                    <td>ID Pemesan</td>
                                    <td><input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}"
                                               readonly></td>
                                </tr>
                                <tr>
                                    <td>ID Pemesanan</td>
                                    <td><input type="text" class="form-control" name="id_pemesanan" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Film</td>
                                    <td>
                                        <select name="id_jadwal" class="form-control">
                                            <option>Pilih Film</option>
                                            @foreach($jadwal as $j)
                                                <option value="{{ $j->id_jadwal }}">{{ $j->judul }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Kursi</td>
                                    <td>
                                        <select name="id_kursi" class="form-control" onchange="inputHarga();">
                                            <option>Pilih Kursi</option>
                                            @foreach($kursi as $k)
                                                <option value="{{ $k->id_kursi }}">{{ $k->no_kursi }}
                                                    | {{ $k->status_kursi }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td><input type="text" id="harga" class="form-control" name="total_pembayaran"
                                               readonly></td>
                                </tr>
                                <tr hidden>
                                    <td hidden><input type="text" class="form-control" name="status" value="Unconfirmed"
                                                      hidden></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Simpan" class="btn btn-sm btn-primary"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                       target="_blank">Sistem Informasi</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<script>
    function inputHarga() {
        var harga = document.getElementById("harga");
        harga.value = "25000";
    }
</script>
<!-- Core -->
<script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<!-- Argon JS -->
<script src="{{ url('assets/js/argon.js?v=1.0.0') }}"></script>
</body>
</html>
