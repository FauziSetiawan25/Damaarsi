@extends('admin.layout.navbar')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Testimoni</h1>
    </div>
    <div class="card shadow mb-4 animated--grow-in">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Tabel Testimoni</h6>
            <a href="{{ route('admin.addtesti') }}" class="btn" style="background-color: #0088FF; color: white">Tambah Testimoni</a>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Nama</th>
                            <th>Testimoni</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b></td>
                                <td align="Center"><img src="{{ asset('asset/img/logo.png') }}" style="width: 100px;height: auto;"></td>
                                <td>
                                    <div class="d-flex flex-column align-items-start">
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="toggleColor(this)">Tampilkan</button>
                                        </div>
                                        <div class="mt-2">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>20 Oktober 2024</td>
                                <td>Udin</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b></td>
                                <td align="Center"><img src="{{ asset('asset/img/logo.png') }}" style="width: 100px;height: auto;"></td>
                                <td>
                                    <div class="d-flex flex-column align-items-start">
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="toggleColor(this)">Nonaktifkan</button>
                                        </div>
                                        <div class="mt-2">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleColor(button) {
        if (button.classList.contains('btn-danger')) {
            button.classList.remove('btn-danger');
            button.classList.add('btn-success'); // Menjadi hijau
            button.textContent = "Nonaktif"; // Mengubah teks
        } else {
            button.classList.remove('btn-success');
            button.classList.add('btn-danger'); // Menjadi merah
            button.textContent = "Tampilkan"; // Mengubah kembali teks
        }
    }
</script>


@endsection