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
            <h1 class="h3 mb-0 text-white">Daftar Admin</h1>
        </div>
        <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Tabel Admin</h6>
                <a href="#" class="btn" style="background-color: #0088FF; color: white" data-toggle="modal"
                    data-target="#addAdminModal">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->nama_admin }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->no_telp }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="status">{{ $admin->role }}</td>
                                    <td>
                                        <div class="d-flex flex-row align-items-start">
                                            <div>
                                                <button 
                                                type="button"
                                                class="btn btn-sm {{ $admin->role === 'admin' ? 'btn-danger' : 'btn-success' }} toggle-role-btn"
                                                data-id="{{ $admin->id }}"
                                                data-role="{{ $admin->role }}"
                                                style="width: 100px; color: white;">
                                                {{ $admin->role === 'admin' ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                            </div>                                      
                                            <div class="mx-2">
                                                <button type="button" class="btn btn-danger btn-sm" style="width: 70px;"
                                                    onclick="showDeleteAdminModal('/api/admin/{{ $admin->id }}', '{{ $admin->id }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-warning btn-sm edit-admin"
                                                    style="width: 70px;" data-toggle="modal"
                                                    data-target="#editAdminModal{{ $admin->id }}">
                                                    Edit
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

    {{-- Modal tambah admin --}}
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4D6957; color: white;">
                    <h5 class="modal-title" id="addAdminLabel">Tambah Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-add-admin">
                        @csrf
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminName">Nama</label>
                                <input type="text" class="form-control" id="adminName" name="nama" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminTelp">No Telp</label>
                                <input type="number" class="form-control" id="adminTelp" name="telp" required>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminUsername">Username</label>
                                <input type="text" class="form-control" id="adminUsername" name="username" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminEmail">Email</label>
                                <input type="email" class="form-control" id="adminEmail" name="email" required>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminPassword">Password</label>
                                <input type="password" class="form-control" id="adminPassword" name="password" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="adminPasswordConfirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="adminPasswordConfirmation"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #0088FF; color: white" data-toggle="modal"
                                data-target="#successAddAdmin">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi Success Add Admin -->
    <div class="modal fade" id="successAddAdmin" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
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

    {{-- Modal edit admin --}}
    @foreach ($admins as $admin)
        <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editAdminLabel{{ $admin->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4D6957; color: white;">
                        <h5 class="modal-title" id="editAdminLabel{{ $admin->id }}">Edit Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                            style="color: white; opacity: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="edit-admin-form" data-id="{{ $admin->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminName{{ $admin->id }}">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $admin->nama_admin }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminTelp{{ $admin->id }}">No Telp</label>
                                    <input type="number" class="form-control" name="telp" value="{{ $admin->no_telp }}" required>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminUsername{{ $admin->id }}">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $admin->username }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminEmail{{ $admin->id }}">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}" required>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #0088FF; color: white" data-toggle="modal"
                                    data-target="#successUpdateAdmin">
                                    Simpan
                                </button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Notifikasi Success Update Admin -->
    <div class="modal fade" id="successUpdateAdmin" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
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

    <script>
        // Kirim data admin baru ke API
        document.addEventListener('DOMContentLoaded', function () {
            const addForm = document.querySelector('.form-add-admin');

            addForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('/api/admin', {
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
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
        
        // Mengubah status admin melalui API
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-role-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const adminId = this.getAttribute('data-id');
                    const currentRole = this.getAttribute('data-role');
                    const newRole = currentRole === 'admin' ? 'nonaktif' : 'admin';

                    fetch(`/api/admin/role/${adminId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.admin) {
                            // Update atribut tombol
                            this.setAttribute('data-role', data.admin.role);
                            this.classList.toggle('btn-danger', data.admin.role === 'admin');
                            this.classList.toggle('btn-success', data.admin.role !== 'admin');
                            this.textContent = data.admin.role === 'admin' ? 'Nonaktifkan' : 'Aktifkan';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });

        // Menampilkan modal konfirmasi hapus
        function showDeleteAdminModal(actionUrl, id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('data-id', id); 
            deleteForm.setAttribute('data-url', `/api/admin/${id}`);

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
                if (!response.ok) throw new Error('Gagal menghapus admin');
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
                alert('Terjadi kesalahan saat menghapus admin.');
            });
        });

        // Mengirim data admin yang ingin diedit ke API
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.edit-admin-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const id = this.getAttribute('data-id');
                    const formData = new FormData(this);

                    // Debugging: cek data form yang dikirim
                    console.log('Data yang dikirim:', Object.fromEntries(formData));

                    fetch(`/api/admin/${id}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            location.reload();
                        } else {
                            alert('Gagal memperbarui admin');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghubungi server.');
                    });
                });
            });
        });

    </script>
@endsection
