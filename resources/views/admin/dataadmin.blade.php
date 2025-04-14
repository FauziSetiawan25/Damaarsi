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
                                                <form action="{{ route('admin.ubahrole', $admin->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn {{ $admin->role === 'admin' ? 'btn-danger' : 'btn-success' }} btn-sm"
                                                        style="width: 100px; color: white;">
                                                        {{ $admin->role === 'admin' ? 'Nonaktifkan' : 'Aktifkan' }}
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="mx-2">
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="width: 70px;">Hapus</button>
                                                </form>
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
                    <form action="{{ route('admin.store') }}" method="POST">
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
                                style="background-color: #0088FF; color: white">Tambah</button>
                        </div>
                    </form>
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
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdminLabel{{ $admin->id }}">Edit Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminName{{ $admin->id }}">Nama</label>
                                    <input type="text" class="form-control" id="adminName" name="nama"
                                        value="{{ $admin->nama_admin }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminTelp{{ $admin->id }}">No Telp</label>
                                    <input type="number" class="form-control" id="adminTelp" name="telp"
                                        value="{{ $admin->no_telp }}" required>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminUsername{{ $admin->id }}">Username</label>
                                    <input type="text" class="form-control" id="adminUsername{{ $admin->id }}"
                                        name="username" value="{{ $admin->username }}" required>
                                </div>
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="adminEmail{{ $admin->id }}">Email</label>
                                    <input type="email" class="form-control" id="adminEmail{{ $admin->id }}"
                                        name="email" value="{{ $admin->email }}" required>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #0088FF; color: white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
