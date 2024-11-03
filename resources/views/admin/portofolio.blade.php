@extends('admin.layout.navbar')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Daftar Portofolio</h1>
    </div>
    <div class="card shadow mb-4 animated--grow-in">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Tabel Portofolio</h6>
            <a href="#" class="btn" style="background-color: #0088FF; color: white" data-toggle="modal" data-target="#addPortoModal">Tambah Portofolio</a>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Terakhir Diubah</th>
                            <th>Diubah Oleh</th>
                            <th>Nama Pemesan</th>
                            <th>Nama Produk</th>
                            <th>Tanggal selesai</th>
                            <th>Luas Bangunan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10 Oktober 2024</td>
                                <td>Admin1</td>
                                <td>Ujang</td>
                                <td>Classic</td>
                                <td>11 Oktober 2024</b></td>
                                <td>200</td>
                                <td><a href="#">Lihat Gambar</a></td>
                                <td>
                                    <div class="d-flex flex-column align-items-start">
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editPortoModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                            <form action="#" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;">Hapus</button>
                                            </form>
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
<div class="modal fade" id="addPortoModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Tambah Portofolio</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="#" method="POST">
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="portoName">Nama Pemesan</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                            <input required="required" type="file" name="gambar1" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Nama Produk</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 2</label>
                            <input type="file" name="gambar2" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="dateDone">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="dateDone" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 3</label>
                            <input type="file" name="gambar3" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="area">Luas Bangunan</label>
                            <input type="number" class="form-control" id="area" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 4</label>
                            <input type="file" name="gambar4" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                </form>
            </div>            
            <div class="modal-footer">
                <button class="btn" type="button" id="saveProductBtn" style="background-color: #0088FF; color: white">Tambah</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPortoModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Edit Produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="#" method="POST">
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="portoName">Nama Pemesan</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                            <input required="required" type="file" name="gambar1" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Nama Produk</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 2</label>
                            <input type="file" name="gambar2" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="dateDone">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="dateDone" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 3</label>
                            <input type="file" name="gambar3" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="area">Luas Bangunan</label>
                            <input type="number" class="form-control" id="area" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 4</label>
                            <input type="file" name="gambar4" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                </form>
            </div>            
            <div class="modal-footer">
                <button class="btn" type="button" id="saveProductBtn" style="background-color: #0088FF; color: white">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
@endsection