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
                <!-- Tombol Copy Link -->
                <button class="btn btn-secondary" id="copyLinkBtn">
                    <i class="fas fa-copy"></i>
                </button>
                <!-- Tombol Tambah Testimoni -->
                <a href="{{ route('testimoni.add') }}" class="btn ml-2" style="background-color: #0088FF; color: white" target="_blank">Tambah Testimoni</a>
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
                            <th>Nama Produk</th>
                            <th>Testimoni</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonis as $testimoni)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $testimoni->created_at->format('d M Y') }}</td>
                                <td>{{ $testimoni->nama }}</td>
                                <td>{{ $testimoni->produk->nama_produk ?? 'Tidak ada' }}</td>
                                <td>{{ $testimoni->testimoni }}</td>
                                <td align="center">
                                    <img src="{{ asset('storage/testimoni/' . $testimoni->gambar) }}" style="width: 100px; height: auto;">
                                </td>
                                <td>
                                    <div class="d-flex flex-column align-items-start">
                                        <form action="{{ route('admin.testimoni.ubahStatus', $testimoni->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="status" value="{{ $testimoni->status == 'aktif' ? 'nonaktif' : 'aktif' }}">
                                            <button type="submit" class="btn btn-sm {{ $testimoni->status == 'aktif' ? 'btn-danger' : 'btn-success' }}" style="width: 100px;">
                                                {{ $testimoni->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
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

{{-- Js untuk menyalin link tambah testimoni --}}
<script>
    document.getElementById('copyLinkBtn').addEventListener('click', function() {
        const testimoniLink = "{{ route('testimoni.add') }}";

        navigator.clipboard.writeText(testimoniLink).then(() => {
            alert('Link Tambah Testimoni telah disalin');
        }).catch(err => {
            console.error('Error copying link: ', err);
        });
    });
</script>

@endsection