@extends('admin.layout.navbar')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Pengaturan Web</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Keterangan</th>
                                    <th>Value</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>No Whatsapp</td>
                                    <td>0888888888888</td>
                                    <td>
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editPengaturanModal">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Email</td>
                                    <td>ujang@gmail.com</td>
                                    <td>
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editPengaturanModal">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Alamat</td>
                                    <td>Sleman, DIY</td>
                                    <td>
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editPengaturanModal">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Instagram</td>
                                    <td>@damaarsi</td>
                                    <td>
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editPengaturanModal">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Banner</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="{{ asset('asset/img/logo.png') }}" alt="" style="width: 100px;height: auto;"></td>
                                    <td>Modern House</td>
                                    <td>Wujudkan impian rumahmu</td>
                                    <td>damaarsi.com/katalog</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 100px;" data-toggle="modal" data-target="#editBannerModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="toggleColor(this)">Nonaktifkan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img src="{{ asset('asset/img/logo.png') }}" alt="" style="width: 100px;height: auto;"></td>
                                    <td>Modern House</td>
                                    <td>Wujudkan impian rumahmu</td>
                                    <td>damaarsi.com/katalog</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 100px;" data-toggle="modal" data-target="#editBannerModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="toggleColor(this)">Tampilkan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img src="{{ asset('asset/img/logo.png') }}" alt="" style="width: 100px;height: auto;"></td>
                                    <td>Modern House</td>
                                    <td>Wujudkan impian rumahmu</td>
                                    <td>damaarsi.com/katalog</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 100px;" data-toggle="modal" data-target="#editBannerModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="toggleColor(this)">Nonaktifkan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><img src="{{ asset('asset/img/logo.png') }}" alt="" style="width: 100px;height: auto;"></td>
                                    <td>Modern House</td>
                                    <td>Wujudkan impian rumahmu</td>
                                    <td>damaarsi.com/katalog</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 100px;" data-toggle="modal" data-target="#editBannerModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                                <button type="button" class="btn btn-success btn-sm" style="width: 100px;" onclick="toggleColor(this)">Tampilkan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><img src="{{ asset('asset/img/logo.png') }}" alt="" style="width: 100px;height: auto;"></td>
                                    <td>Modern House</td>
                                    <td>Wujudkan impian rumahmu</td>
                                    <td>damaarsi.com/katalog</td>
                                    <td>
                                        <div>
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 100px;" data-toggle="modal" data-target="#editBannerModal">Edit</button>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="toggleColor(this)">Nonaktifkan</button>
                                            </form>
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
</div>
<div class="modal fade" id="editPengaturanModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Edit Pengaturan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="#" method="POST">
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Keterangan</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Value</label>
                            <input type="text" class="form-control" id="productName" required>
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
<div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Edit Banner</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="#" method="POST">
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productPrice">Title</label>
                            <input type="text" class="form-control" id="productPrice" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productDescription">Deskripsi</label>
                            <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productPrice">Link</label>
                            <input type="text" class="form-control" id="productPrice" required>
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
<script>
    function toggleColor(button) {
        if (button.classList.contains('btn-danger')) {
            button.classList.remove('btn-danger');
            button.classList.add('btn-success'); // Menjadi hijau
            button.textContent = "Tampilkan"; // Mengubah teks
        } else {
            button.classList.remove('btn-success');
            button.classList.add('btn-danger'); // Menjadi merah
            button.textContent = "Nonaktifkan"; // Mengubah kembali teks
        }
    }
</script>
@endsection