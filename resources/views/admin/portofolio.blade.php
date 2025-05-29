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
            <h1 class="h3 mb-0 text-white">Daftar Portofolio</h1>
        </div>
        <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Tabel Portofolio</h6>
                <a href="#" class="btn" style="background-color: #0088FF; color: white" data-toggle="modal"
                    data-target="#addPortoModal">Tambah Portofolio</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Terakhir Diubah</th>
                                <th>Diubah Oleh</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Produk</th>
                                <th>Tanggal Selesai</th>
                                <th>Luas Bangunan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portofolio as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->updated_at->format('d M Y') }}</td>
                                    <td>{{ $item->admin->nama_admin ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $item->nama }}{{ $item->lokasi ? ', ' . $item->lokasi : '' }}</td>
                                    <td>{{ $item->produk->nama_produk ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d M Y') }}</td>
                                    <td>{{ $item->luas }}</td>
                                    <td>
                                        <a href="#" class="view-images"
                                            data-images='[
                                        @foreach ($item->gambarPortofolio as $gambar)
                                            "{{ asset('storage/portofolio/' . $gambar->gambar) }}"@if (!$loop->last),@endif @endforeach
                                    ]'>Lihat
                                            Gambar</a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-start">
                                            <div>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editPortoModal{{ $item->id }}" style="width: 70px">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-danger btn-sm" style="width: 70px;"
                                                    onclick="showDeletePortoModal('/api/portofolio/{{ $item->id }}', '{{ $item->id }}')">
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
    <!-- Modal Tambah Portofolio -->
    <div class="modal fade" id="addPortoModal" tabindex="-1" role="dialog" aria-labelledby="addPortoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="addPortoModalLabel">Tambah Portofolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAddPorto" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                                <input type="file" name="gambar1" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif"
                                    style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;"
                                    required>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <select class="form-control" name="nama_produk" id="nama_produk" required>
                                        <option value="" disabled selected>Pilih Nama Produk</option>
                                        @foreach ($produk as $produkItem)
                                            <option value="{{ $produkItem->id }}">{{ $produkItem->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 2</label>
                                <input type="file" name="gambar2" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai"
                                    required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 3</label>
                                <input type="file" name="gambar3" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="number" class="form-control" name="luas_bangunan" id="luas_bangunan"
                                    required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 4</label>
                                <input type="file" name="gambar4" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif">
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

    <!-- Modal Edit -->
    @foreach ($portofolio as $item)
        <div class="modal fade" id="editPortoModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editPortoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4D6957; color: white;">
                        <h5 class="modal-title" id="editPortoModalLabel">Edit Portofolio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: white; opacity: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editPortoForm{{ $item->id }}" data-id="{{ $item->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="nama_pemesan">Nama Pemesan</label>
                                    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan"
                                        value="{{ old('nama_pemesan', $item->nama) }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                                    <input type="file" name="gambar1" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif"
                                        style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <div class="form-group">
                                        <label for="nama_produk">Nama Produk</label>
                                        <select class="form-control" name="nama_produk" id="nama_produk" required>
                                            @foreach ($produk as $produkItem)
                                                <option value="{{ $produkItem->id }}"
                                                    {{ old('nama_produk', $item->id_produk) == $produkItem->id ? 'selected' : '' }}>
                                                    {{ $produkItem->nama_produk }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar">Unggah Gambar 2</label>
                                    <input type="file" name="gambar2" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif">
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai"
                                        id="tanggal_selesai"
                                        value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($item->tgl_selesai)->format('Y-m-d')) }}"
                                        required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar">Unggah Gambar 3</label>
                                    <input type="file" name="gambar3" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif">
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="luas_bangunan">Luas Bangunan</label>
                                    <input type="number" class="form-control" name="luas_bangunan" id="luas_bangunan"
                                        value="{{ old('luas_bangunan', $item->luas) }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="gambar">Unggah Gambar 4</label>
                                    <input type="file" name="gambar4" class="form-control-file"
                                        accept=".jpg, .jpeg, .png, .gif">
                                </div>
                            </div>

                            <!-- Gambar Lama -->
                            @if ($item->gambarPortofolio->count() > 0)
                                <div class="form-group">
                                    <label for="gambarLama">Gambar Lama</label>
                                    <div class="d-flex">
                                        @foreach ($item->gambarPortofolio as $gambar)
                                            <img src="{{ asset('storage/portofolio/' . $gambar->gambar) }}"
                                                class="img-thumbnail" width="100">
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #0088FF; color: white" data-toggle="modal"
                                    data-target="#successUpdateModal">Edit</button>
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
    <div class="modal fade" id="deleteConfirmPorto" tabindex="-1" aria-hidden="true">
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
    <div class="modal fade" id="successDeletePorto" tabindex="-1" aria-hidden="true">
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
                    <h5 class="modal-title" id="imageModalLabel">Gambar Portofolio</h5>
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
    <!-- Script untuk menangani klik tautan dan menampilkan gambar -->
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

        // Kirim data porto baru ke API
        document.addEventListener('DOMContentLoaded', function () {
            const addForm = document.querySelector('#formAddPorto');

            addForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('/api/portofolio', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer {{ auth()->guard("admin")->user()->token ?? '' }}',
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
                    cconsole.error('Error:', error);
                });
            });
        });

        // Edit porto via API
        document.addEventListener('DOMContentLoaded', function () {
            const editForms = document.querySelectorAll('form[id^="editPortoForm"]');

            editForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const portofolioId = this.dataset.id;
                    const formData = new FormData(this);

                    fetch(`/api/portofolio/${portofolioId}`, {
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
                            alert('Gagal mengedit portofolio:\n' + Object.values(data.error).join('\n'));
                        }
                    })
                    .catch(error => {
                        cconsole.error('Error:', error);
                    });
                });
            });
        });

        // Menampilkan modal konfirmasi hapus
        function showDeletePortoModal(actionUrl, id) {
             const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('data-id', id); 
            deleteForm.setAttribute('data-url', `/api/portofolio/${id}`);

            document.getElementById('deleteDataInfo').innerHTML = "ID = " + id;
            $('#deleteConfirmPorto').modal('show');
        }

        document.getElementById('deleteForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Hentikan submit form biasa

            const deleteForm = this;
            const id = deleteForm.getAttribute('data-id');
            const apiUrl = deleteForm.getAttribute('data-url');

            $('#deleteConfirmPorto').modal('hide'); // Tutup modal konfirmasi

            fetch(apiUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal menghapus portofolio');
                return response.json();
            })
            .then(data => {
                setTimeout(() => {
                    $('#successDeletePorto').modal('show'); // Tampilkan modal sukses
                }, 500);

                setTimeout(() => {
                    location.reload(); // Reload halaman untuk perbarui tampilan
                }, 2000);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus portofolio.');
            });
        });
    </script>
@endsection
