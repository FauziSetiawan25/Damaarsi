<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Damaarsi</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img class="mt-3" src="{{ asset('asset/img/logo.png') }}" style="width: 140px; height: auto;">
                </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }} mt-5" style="{{ request()->is('admin/dashboard') ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ request()->is('admin/dashboard') ? '' : 'color: black;' }}" href="{{ route('admin.dashboard') }}">
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/produk') ? 'active' : '' }}" style="{{ (request()->is('admin/produk')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/produk')) ? '' : 'color: black' }}" href="{{ route('admin.produk') }}">
                    <span>Manajemen Produk</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/testimoni') ? 'active' : '' }}" style="{{ (request()->is('admin/testimoni')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/testimoni')) ? '' : 'color: black' }}" href="{{ route('admin.testimoni') }}">
                    <span>Manajemen Testimoni</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/portofolio') ? 'active' : '' }}" style="{{ (request()->is('admin/portofolio')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/portofolio')) ? '' : 'color: black' }}" href="{{ route('admin.portofolio') }}">
                    <span>Manajemen Portofolio</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/customer') ? 'active' : '' }}" style="{{ (request()->is('admin/customer')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/customer')) ? '' : 'color: black' }}" href="{{ route('admin.customer') }}">
                    <span>Data Customer</span></a>
            </li>
            
            {{-- SuperAdmin --}}
            {{-- <hr class="sidebar-divider" style="border-color: black;"> --}}

            <li class="nav-item {{ request()->is('admin/dataadmin') ? 'active' : '' }}" style="{{ (request()->is('admin/dataadmin')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/dataadmin')) ? '' : 'color: black' }}" href="{{ route('admin.dataadmin') }}">
                    <span>Data Admin</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/pengaturan') ? 'active' : '' }}" style="{{ (request()->is('admin/pengaturan')) ? 'background-color: #4D6A58;' : '' }}">
                <a class="nav-link" style="{{ (request()->is('admin/pengaturan')) ? '' : 'color: black' }}" href="{{ route('admin.pengaturan') }}">
                    <span>Pengaturan Web</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #4D6A58;">

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
                <!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Damaarsi 2024</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="{{ route('admin.index') }}">Logout</a>
    </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('asset/}vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>

    </div>
</body>
</html>