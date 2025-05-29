@extends('admin.layout.navbar')
@section('content')
    @if (session('success'))
        <div class="alert alert-success mx-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-white">Daftar Katalog</h1>
        </div>
        <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Tabel Katalog</h6>
                <a href="#" class="btn" style="background-color: #0088FF; color: white" data-toggle="modal"
                    data-target="#addProductModal">Tambah Produk</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Terakhir Diubah</th>
                                <th>Diubah Oleh</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->updated_at->format('d M Y') }}</td> <!-- Format tanggal -->
                                    <td>{{ $item->admin->nama_admin ?? 'Admin Tidak Ditemukan' }}</td>
                                    <td>{{ $item->tipe }} {{ $item->nama_produk }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}/ m²</td>
                                    <td>
                                        <a href="#" class="view-images"
                                            data-images='[
                                        @foreach ($item->gambarProduk as $gambar)
                                            "{{ asset('storage/produk/' . $gambar->gambar) }}"@if (!$loop->last),@endif @endforeach
                                    ]'>Lihat
                                            Gambar</a>
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-warning btn-sm" style="width: 70px;"
                                                    data-toggle="modal"
                                                    data-target="#editProductModal{{ $item->id }}">Edit</button>
                                            </div>
                                            <div class="mt-2">
                                                <button 
                                                    type="button"
                                                    class="btn btn-sm {{ $item->recomen == 'aktif' ? 'btn-danger' : 'btn-success' }} toggle-recomen-btn"
                                                    data-id="{{ $item->id }}"
                                                    data-status="{{ $item->recomen }}"
                                                    style="width: 100%;">
                                                    {{ $item->recomen == 'aktif' ? 'Unrecomen' : 'Recomen' }}
                                                </button>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-danger btn-sm" style="width: 70px;"
                                                    onclick="showDeleteModal('/api/produk/{{ $item->id }}', '{{ $item->id }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="addProductLabel">Tambah Katalog</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-add-produk">
                        @csrf
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="productName">Nama Katalog</label>
                                <input type="text" class="form-control" id="productName" name="nama_produk" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar1">Unggah Gambar 1 (Wajib)</label>
                                <input required="required" type="file" name="gambar1" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif"
                                    style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                                <small class="text-danger">*format .jpg, .jpeg, .png, .gif</small>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="productPrice">Harga Produk</label>
                                <input type="number" class="form-control" id="productPrice" name="harga" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar2">Unggah Gambar 2</label>
                                <input type="file" name="gambar2" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif">
                                <small class="text-danger">*format .jpg, .jpeg, .png, .gif</small>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="productType">Tipe Produk</label>
                                <select class="form-control" id="productType" name="tipe" required>
                                    <option value="" disabled selected>Pilih Nama Produk</option>
                                    <option value="Paket">Paket</option>
                                    <option value="Desain">Desain</option>
                                </select>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar3">Unggah Gambar 3</label>
                                <input type="file" name="gambar3" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif">
                                <small class="text-danger">*format .jpg, .jpeg, .png, .gif</small>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="productDescription">Deskripsi Produk</label>
                                <textarea class="form-control" id="productDescription" name="deskripsi" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #0088FF; color: white" data-toggle="modal"
                                data-target="#successAddModal">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi Success Add Modal -->
    <div class="modal fade" id="successAddModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header"
                    style="background-color: #4D6957; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/845/845646.png" width="50" alt="Success">
                    <p class="mt-3">Data Berhasil Tersimpan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Produk -->
    @foreach ($produk as $item)
        <div class="modal fade" id="editProductModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editProductModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4D6957; color: white;">
                        <h5 class="modal-title" id="editProductModalLabel{{ $item->id }}">Edit Katalog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: white; opacity: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editProdukForm{{ $item->id }}" data-id="{{ $item->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productName">Nama Katalog</label>
                                    <input type="text" class="form-control" name="nama_produk" id="productName"
                                        value="{{ old('nama_produk', $item->nama_produk) }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar1">Unggah Gambar 1 (Wajib)</label>
                                    <input type="file" name="gambar1" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif"
                                        style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                                    <small class="text-danger">*format .jpg, .jpeg, .png, .gif</small>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productPrice">Harga Produk</label>
                                    <input type="number" class="form-control" name="harga" id="productPrice"
                                        value="{{ old('harga', $item->harga) }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar2">Unggah Gambar 2</label>
                                    <input type="file" name="gambar2" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif">
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productType">Tipe Produk</label>
                                    <select class="form-control" id="productType" name="tipe" required>
                                        <option value="Paket" {{ $item->tipe == 'Paket' ? 'selected' : '' }}>Paket</option>
                                        <option value="Desain" {{ $item->tipe == 'Desain' ? 'selected' : '' }}>Desain</option>
                                    </select>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar3">Unggah Gambar 3</label>
                                    <input type="file" name="gambar3" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif">
                                </div>
                            </div>
                            
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productDescription">Deskripsi Produk</label>
                                    <textarea class="form-control" name="deskripsi" id="productDescription" rows="3" required>{{ old('deskripsi', $item->deskripsi) }}</textarea>
                                </div>
                            </div>

                            <!-- Gambar Lama -->
                            @if ($item->gambarProduk->count() > 0)
                                <div class="form-group">
                                    <label for="gambarLama">Gambar Lama</label>
                                    <div class="d-flex">
                                        @foreach ($item->gambarProduk as $gambar)
                                            <img src="{{ asset('storage/produk/' . $gambar->gambar) }}"
                                                class="img-thumbnail" width="100">
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #0088FF; color: white" data-toggle="modal"
                                    data-target="#successUpdateModal">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Notifikasi Success Update Modal -->
    <div class="modal fade" id="successUpdateModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header"
                    style="background-color: #4D6957; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/845/845646.png" width="50" alt="Success">
                    <p class="mt-3">Data Berhasil Diperbarui</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>Apakah yakin ingin menghapus data?</p>
                    <p id="deleteDataInfo"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Notifikasi Sukses hapus-->
    <div class="modal fade" id="successDeleteKatalog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('images/trash-icon.png') }}" alt="Deleted" width="125">
                    <p class="mt-3">Data Berhasil Dihapus</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal untuk menampilkan gambar sebagai slider -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="carouselImages">
                            <!-- Gambar akan ditambahkan di sini -->
                        </div>
                        <div class="carousel-controls">
                            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev"
                                style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"
                                    style="background-color: black;"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next"
                                style="color: black;">
                                <span class="carousel-control-next-icon" aria-hidden="true"
                                    style="background-color: black;"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.view-images').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const images = JSON.parse(this.getAttribute('data-images'));
                const carouselImages = document.getElementById('carouselImages');
                const carouselControls = document.querySelector('.carousel-controls');

                carouselImages.innerHTML = '';

                if (images.length <= 1) {
                    carouselControls.style.display = 'none';
                } else {
                    carouselControls.style.display = 'block';
                }

                images.forEach((image, index) => {
                    const activeClass = index === 0 ? 'active' : '';
                    const carouselItem = document.createElement('div');
                    carouselItem.className = `carousel-item ${activeClass}`;

                    const img = document.createElement('img');
                    img.src = image;
                    img.className = 'd-block w-100';

                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '80vh';
                    img.style.objectFit = 'contain';

                    const caption = document.createElement('div');
                    caption.className = 'text-center';
                    caption.innerHTML = `<h5>Gambar ${index + 1}</h5>`;

                    carouselItem.appendChild(img);
                    carouselItem.appendChild(caption);
                    carouselImages.appendChild(carouselItem);
                });

                $('#imageModal').modal('show');
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-recomen-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const produkId = this.getAttribute('data-id');
                    const currentStatus = this.getAttribute('data-status');
                    const newStatus = currentStatus === 'aktif' ? 'nonaktif' : 'aktif';
    
                    fetch(`/api/produk/recomen/${produkId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update tampilan tombol
                            this.setAttribute('data-status', data.data.recomen);
                            this.classList.toggle('btn-danger');
                            this.classList.toggle('btn-success');
                            this.textContent = data.data.recomen === 'aktif' ? 'Unrecomen' : 'Recomen';
                        } else {
                            alert('Gagal memperbarui status.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghubungi server.');
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const addForm = document.querySelector('.form-add-produk');

            addForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('/api/produk', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        location.reload();
                    } else if (data.error) {
                        alert('Gagal menambahkan portofolio:\n' + Object.values(data.error).join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengirim data.');
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const editForms = document.querySelectorAll('form[id^="editProdukForm"]');

            editForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const produkId = this.dataset.id;
                    const formData = new FormData(this);

                    fetch(`/api/produk/${produkId}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            location.reload();
                        } else if (data.error) {
                            alert('Gagal mengedit produk:\n' + Object.values(data.error).join('\n'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });

        // Menampilkan modal konfirmasi hapus
        function showDeleteModal(actionUrl, id) {
             const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('data-id', id); 
            deleteForm.setAttribute('data-url', `/api/produk/${id}`);

            document.getElementById('deleteDataInfo').innerHTML = "ID = " + id;
            $('#deleteConfirmModal').modal('show');
        }

        document.getElementById('deleteForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Hentikan submit form biasa

            const deleteForm = this;
            const id = deleteForm.getAttribute('data-id');
            const apiUrl = deleteForm.getAttribute('data-url');

            $('#deleteConfirmModal').modal('hide'); // Tutup modal konfirmasi

            fetch(apiUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal menghapus produk');
                return response.json();
            })
            .then(data => {
                setTimeout(() => {
                    $('#successDeleteKatalog').modal('show'); // Tampilkan modal sukses
                }, 500);

                setTimeout(() => {
                    location.reload(); // Reload halaman untuk perbarui tampilan
                }, 2000);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus produk.');
            });
        });
    </script>
@endsection
