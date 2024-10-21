<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img class="mt-3" src="{{ asset('asset/img/logo.png') }}" style="width: 140px; height: auto;">
                </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mt-5" style="{{ request()->is('admin/dashboard') ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ request()->is('admin/dashboard') ? '' : 'color: black;' }}" href="{{ route('admin.dashboard') }}">
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active" style="{{ (request()->is('admin/produk')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/produk')) ? '' : 'color: black' }}" href="{{ route('admin.produk') }}">
                    <span>Manajemen Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="color: black" href="index.html">
                    <span>Manajemen Testimoni</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="color: black" href="index.html">
                    <span>Manajemen Portofolio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="color: black" href="index.html">
                    <span>Data Customer</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('asset/img/undraw_profile.svg') }}">
                                <span class="ml-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                @yield('content')