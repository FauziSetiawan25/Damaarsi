@extends('admin.layout.navbar')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Daftar Admin</h1>
    </div>
    <div class="card shadow mb-4 animated--grow-in">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Tabel Admin</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="adminRow1">
                                <td>1</td>
                                <td>Ujang</td>
                                <td>Admin1</td>
                                <td>088888888888</td>
                                <td>ujang@gmail.com</td>
                                <td class="status">Admin</td>
                                <td>
                                    <div class="d-flex flex-row align-items-start">
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 100px;" onclick="toggleStatus(this)">Nonaktifkan</button>
                                        </div>
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-warning btn-sm" style="width: 70px;" data-toggle="modal" data-target="#editAdminModal">Edit</button>
                                        </div>
                                        <div>
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
<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Edit Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="#" method="POST">
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Nama</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">No Telp</label>
                            <input type="number" class="form-control" id="productName" required>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Username</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productName">Email</label>
                            <input type="email" class="form-control" id="productName" required>
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
    function toggleStatus(button) {
    const adminStatusCell = button.closest('tr').querySelector('.status');
    
    if (adminStatusCell.textContent === 'Admin') {
        adminStatusCell.textContent = 'Nonaktif';
        adminStatusCell.style.color = 'red'; // Ubah warna teks menjadi merah
        button.classList.remove('btn-danger');
        button.classList.add('btn-success'); // Menjadi hijau
        button.textContent = "Aktifkan"; // Mengubah teks
    } else {
        adminStatusCell.textContent = 'Admin';
        adminStatusCell.style.color = 'black'; // Kembalikan warna teks ke hitam
        button.classList.remove('btn-success');
        button.classList.add('btn-danger'); // Menjadi merah
        button.textContent = "Nonaktifkan"; // Mengubah kembali teks
    }
}
    
</script>
@endsection