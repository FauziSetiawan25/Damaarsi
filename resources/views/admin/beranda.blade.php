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
            <h1 class="h3 mb-0 text-white">Kelola Beranda</h1>
        </div>

        <div class="row">
            {{-- Tabel Layanan Kami --}}
            <div class="col-lg-12">
                <div class="card shadow mb-4 animated--grow-in">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark">Tabel Layanan Kami</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td align="center">
                                                <img src="{{ asset('storage/layanan/' . $item->gambar) }}"
                                                    style="width: 100px; height: auto;">
                                            </td>
                                            <td>
                                                <div class="mx-2">
                                                    <button type="button" class="btn btn-warning btn-sm edit-layanan"
                                                        style="width: 100%;" data-toggle="modal"
                                                        data-target="#editLayananModal{{ $item->id }}">
                                                        Edit
                                                    </button>
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

            {{-- Tabel Why Choose Us --}}
            <div class="col-lg-12">
                <div class="card shadow mb-4 animated--grow-in">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark">Tabel Mengapa Harus Memilih Kami</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Memilih</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($memilih as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td align="center">
                                                <img src="{{ asset('storage/memilih/' . $item->gambar) }}"
                                                    style="width: 100px; height: auto;">
                                            </td>
                                            <td>
                                                <div class="mx-2">
                                                    <button type="button" class="btn btn-warning btn-sm edit-memilih"
                                                        style="width: 100%;" data-toggle="modal"
                                                        data-target="#editMemilihModal{{ $item->id }}">
                                                        Edit
                                                    </button>
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
    </div>

    {{-- Modal edit layanan --}}
    @foreach ($layanan as $item)
        <div class="modal fade" id="editLayananModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editLayananLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4D6957; color: white;">
                        <h5 class="modal-title" id="editlayananLabel{{ $item->id }}">Edit Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: white; opacity: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title{{ $item->id }}">Nama Layanan</label>
                                <input type="text" class="form-control" id="title{{ $item->id }}" name="title"
                                    value="{{ $item->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar{{ $item->id }}">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar{{ $item->id }}"
                                    name="gambar" value="{{ $item->gambar }}" required>
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

    {{--  Modal Edit Why Choose Us --}}
    @foreach ($memilih as $item)
        <div class="modal fade" id="editMemilihModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editMemilihLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #4D6957; color: white;">
                        <h5 class="modal-title" id="editMemilihLabel{{ $item->id }}">Edit Mengapa Harus Memilih Kami
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="color: white; opacity: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.memilih.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title{{ $item->id }}">Nama Memilih</label>
                                <input type="text" class="form-control" id="title{{ $item->id }}" name="title"
                                    value="{{ $item->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar{{ $item->id }}">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar{{ $item->id }}"
                                    name="gambar" value="{{ $item->gambar }}" accept=".jpg, .jpeg, .png, .gif"
                                    style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;"required>
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
