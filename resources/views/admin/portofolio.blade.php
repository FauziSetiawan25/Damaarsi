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
                                <td><a href="#" class="view-images" data-images='["{{ asset('asset/img/logo.png') }}", "{{ asset('asset/img/logo.png') }}", "{{ asset('asset/img/logo.png') }}", "{{ asset('asset/img/logo.png') }}"]'>Lihat Gambar</a></td>
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
<!-- Modal untuk menampilkan gambar sebagai slider -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar Portofolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carouselImages">
                        <!-- Gambar akan ditambahkan di sini -->
                    </div>
                    <div class="carousel-controls">
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev" style="color: black;">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script untuk menangani klik tautan dan menampilkan gambar -->
<script>
    document.querySelectorAll('.view-images').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const images = JSON.parse(this.getAttribute('data-images'));
            const carouselImages = document.getElementById('carouselImages');
            carouselImages.innerHTML = ''; // Kosongkan isi carousel sebelumnya
    
            images.forEach((image, index) => {
                const activeClass = index === 0 ? 'active' : ''; // Gambar pertama menjadi aktif
                const carouselItem = document.createElement('div');
                carouselItem.className = `carousel-item ${activeClass}`;
    
                const img = document.createElement('img');
                img.src = image; // Ubah dengan path gambar yang sesuai
                img.className = 'd-block w-100'; // Untuk ukuran responsif
    
                // Membuat elemen caption di luar img
                const caption = document.createElement('div');
                caption.className = 'text-center'; // Tambahkan kelas untuk meratakan teks
                caption.innerHTML = `<h5>Gambar ${index + 1}</h5>`; // Keterangan gambar ke berapa
    
                carouselItem.appendChild(img);
                carouselItem.appendChild(caption);
                carouselImages.appendChild(carouselItem);
            });
    
            // Tampilkan modal
            $('#imageModal').modal('show');
        });
    });
</script>
@endsection