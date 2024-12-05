@extends('admin.layout.navbar')
@section('content')

@if(session('success'))
    <div class="alert alert-success mx-3">
        {{ session('success') }}
    </div>
@endif

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Pengaturan Web</h1>
    </div>

    <div class="row">
        {{-- Tabel pengaturan web --}}
        <div class="col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark">Tabel Pengaturan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Value</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengaturan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>
                                            <div class="mx-2">
                                                <button type="button" class="btn btn-warning btn-sm edit-pengaturan" style="width: 100%;"
                                                data-toggle="modal" 
                                                data-target="#editPengaturanModal{{ $item->id }}">
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

        {{-- Tabel pengaturan banner --}}
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
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/banner/' . $banner->gambar) }}" alt="" style="width: 100px; height: auto;"></td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->deskripsi }}</td>
                                        <td>{{ $banner->link }}</td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-warning btn-sm edit-banner"style="width: 100%;"
                                                data-toggle="modal" 
                                                data-target="#editBannerModal{{ $banner->id }}">
                                                Edit
                                                </button>
                                            </div>
                                            <div class="mt-2">
                                                <form action="{{ route('admin.banner.ubahStatus', $banner->id) }}" method="POST" >
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="status" value="{{ $banner->status == 'aktif' ? 'nonaktif' : 'aktif' }}">
                                                    <button type="submit" class="btn btn-sm {{ $banner->status == 'aktif' ? 'btn-danger' : 'btn-success' }}" style="width: 100%;">
                                                        {{ $banner->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
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
    </div>
</div>

{{-- Modal edit pengaturan web --}}
@foreach($pengaturan as $item)
    <div class="modal fade" id="editPengaturanModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPengaturanLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPengaturanLabel{{ $item->id }}">Edit Pengaturan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pengaturan.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="keterangan{{ $item->id }}">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan{{ $item->id }}" name="keterangan" value="{{ $item->keterangan }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="value{{ $item->id }}">Value</label>
                            <input type="text" class="form-control" id="value{{ $item->id }}" name="value" value="{{ $item->value }}" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="background-color: #0088FF; color: white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Modal edit pengaturan banner --}}
@foreach($banners as $banner)
<div class="modal fade" id="editBannerModal{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="editBannerLabel{{ $banner->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Tambahkan kelas modal-lg untuk ukuran besar -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBannerLabel{{ $banner->id }}">Edit Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title{{ $banner->id }}">Title</label>
                        <input type="text" class="form-control" id="title{{ $banner->id }}" name="title" value="{{ $banner->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar{{ $banner->id }}">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" id="gambar{{ $banner->id }}" accept=".jpg, .jpeg, .png, .gif">
                        <small>Gambar saat ini:</small><br>
                        <img src="{{ asset('storage/banner/' . $banner->gambar) }}" alt="Current Image" style="width: 100px; height: auto;">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi{{ $banner->id }}">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi{{ $banner->id }}" name="deskripsi" rows="3" required>{{ $banner->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link{{ $banner->id }}">Link</label>
                        <input type="text" class="form-control" id="link{{ $banner->id }}" name="link" value="{{ $banner->link }}" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" style="background-color: #0088FF; color: white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection