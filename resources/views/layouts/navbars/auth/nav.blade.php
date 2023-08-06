<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <div class="nav-item d-flex align-self-end">
                <a href="{{ route('pelaporan-lalu-lintas.create') }}" target="_blank" class="btn btn-success active mb-0 text-white" role="button" aria-pressed="true">
                    + Tambah Laporan
                </a>
            </div>
            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
            @auth
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('logout') }}" target="_blank" class="btn btn-danger active mb-0 text-white" role="button" aria-pressed="true">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
            @endauth

            @guest
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('login') }}" target="_blank" class="btn btn-info active mb-0 text-white" role="button" aria-pressed="true">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Login Admin</span>
                </a>
            </li>
            @endguest
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
