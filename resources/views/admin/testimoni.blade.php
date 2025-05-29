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
                <div class="d-flex">
                    <!-- Tombol Tambah Testimoni -->
                    <a href="#" class="btn ml-2" style="background-color: #0088FF; color: white" data-toggle="modal"
                        data-target="#addTestimoniModal">Tambah Testimoni</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Ditambahkan</th>
                                <th>Nama</th>
                                <th>Testimoni</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonis as $testimoni)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testimoni->created_at->format('d M Y') }}</td>
                                    <td>{{ $testimoni->nama }}</td>
                                    <td>{{ $testimoni->testimoni }}</td>
                                    <td align="center">
                                        <img src="{{ asset('storage/testimoni/' . $testimoni->gambar) }}"
                                            style="width: 100px; height: auto;">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-start">
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 70px;"
                                                    onclick="showDeleteTestiModal('/api/testimoni/{{ $testimoni->id }}', '{{ $testimoni->id }}')">
                                                    Hapus
                                                </button>
                                            </form>
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

    <!-- Modal Tambah Testimoni -->
    <div class="modal fade" id="addTestimoniModal" tabindex="-1" role="dialog" aria-labelledby="addTestimoniLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="addTestimoniLabel">Tambah Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="testimoniForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar (Wajib)</label>
                                <input type="file" name="gambar" class="form-control-file"
                                    accept=".jpg, .jpeg, .png, .gif"
                                    style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;"
                                    required>
                                <small class="text-danger">*format .jpg, .jpeg, .png</small>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 46%;">
                                <label for="testimoni">Testimoni</label>
                                <textarea class="form-control" name="testimoni" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="background-color: #0088FF; color: white"
                                data-toggle="modal" data-target="#successModal">Kirim</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Notifikasi Berhasil -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="successLabel">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://cdn-icons-png.flaticon.com/128/845/845646.png" width="50" alt="Success">
                    <p class="mt-3">Testimoni Berhasil Ditambahkan!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmTesti" tabindex="-1" aria-hidden="true">
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
                        <button type="submit" class="btn btn-danger" data-toggle="modal"data-target="#successDeleteTesti">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Notifikasi Sukses hapus-->
    <div class="modal fade" id="successDeleteTesti" tabindex="-1" aria-hidden="true">
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

    <script>
        // Kirim data testi baru ke API
        document.addEventListener('DOMContentLoaded', function () {
            const testimoniForm = document.getElementById('testimoniForm');

            testimoniForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('/api/testimoni', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Gagal mengirim:', error);
                });
            });
        });

        // Menampilkan modal konfirmasi hapus
        function showDeleteTestiModal(actionUrl, id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('data-id', id); 
            deleteForm.setAttribute('data-url', `/api/testimoni/${id}`);

            document.getElementById('deleteDataInfo').innerHTML = "ID = " + id;
            $('#deleteConfirmTesti').modal('show');
        }

        document.getElementById('deleteForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Hentikan submit form biasa

            const deleteForm = this;
            const id = deleteForm.getAttribute('data-id');
            const apiUrl = deleteForm.getAttribute('data-url');

            $('#deleteConfirmTesti').modal('hide'); // Tutup modal konfirmasi

            fetch(apiUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal menghapus testimoni');
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
                alert('Terjadi kesalahan saat menghapus testimoni.');
            });
        });
    </script>
@endsection
