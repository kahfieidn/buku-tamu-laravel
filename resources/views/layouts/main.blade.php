<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Disposisi Surat</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/visitor"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{  request()->routeIs('homepage.*') ? 'active' : '' }}">
                            <a href="/home" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- @can('view', App\Models\BukuTamu::class)
                        <li class="sidebar-item active">
                            <a href="/visitor" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endcan -->

                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link '>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Kelola Surat</span>
                            </a>
                            <ul class="submenu {{  request()->routeIs('surat.index') ? 'active' : '' }} {{  request()->routeIs('disposisi.index') ? 'active' : '' }}">
                                <li class="submenu-item {{  request()->routeIs('surat.*') ? 'active' : '' }}">
                                    <a href="{{ route('surat.index') }}">Lihat Surat</a>
                                </li>
                                <li class="submenu-item {{  request()->routeIs('disposisi.*') ? 'active' : '' }}">
                                    <a href="{{ route('disposisi.index') }}">Tujuan Disposisi</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{  request()->routeIs('instansi.*') ? 'active' : '' }}">
                            <a href="{{ route('instansi.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Kelola Instansi</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link '>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu {{  request()->routeIs('report.*') ? 'active' : '' }}">
                                <li class="submenu-item {{  request()->routeIs('report.*') ? 'active' : '' }}">
                                    <a href="{{ route('report.index') }}">Kelola Laporan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Kelola User</span>
                            </a>
                            <ul class="submenu {{  request()->routeIs('user.index') ? 'active' : '' }}">
                                <li class="submenu-item {{  request()->routeIs('user.*') ? 'active' : '' }}">
                                    <a href="{{route('user.index')}}">Lihat User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Akun Kamu</li>

                        <li class="sidebar-item has-sub">
                        @guest
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Login</span>
                            </a>
                            <ul class="submenu ">
                            @if (Route::has('login'))
                                <li class="submenu-item ">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="submenu-item ">
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        </li>
                    </ul>
                        @else
                            <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                        @endguest

                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Kahfie</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://jagoankode.com">Kahfie</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <script src="/assets/js/main.js"></script>
</body>
</html>