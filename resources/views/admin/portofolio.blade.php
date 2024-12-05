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
                            @foreach($portofolio as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->updated_at->format('d M Y') }}</td>
                                    <td>{{ $item->admin->nama_admin ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $item->nama }}{{ $item->lokasi ? ', ' . $item->lokasi : '' }}</td>
                                    <td>{{ $item->produk->nama_produk ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d M Y') }}</td>
                                    <td>{{ $item->luas }}</td>
                                    <td>
                                        <a href="#" class="view-images" data-images='[
                                        @foreach($item->gambarPortofolio as $gambar)
                                            "{{ asset('storage/portofolio/' . $gambar->gambar) }}"@if(!$loop->last),@endif
                                        @endforeach
                                    ]'>Lihat Gambar</a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-start">
                                            <div>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPortoModal{{ $item->id }}" style="width: 70px">
                                                Edit
                                                </button>
                                            </div>
                                            <div class="mt-2">
                                                <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;">Hapus</button>
                                                </form>
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
<div class="modal fade" id="addPortoModal" tabindex="-1" role="dialog" aria-labelledby="addPortoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPortoModalLabel">Tambah Portofolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                            <input type="file" name="gambar1" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;" required>
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <select class="form-control" name="nama_produk" id="nama_produk" required>
                                    <option value="" disabled selected>Pilih Nama Produk</option>
                                    @foreach($produk as $produkItem)
                                        <option value="{{ $produkItem->id }}">{{ $produkItem->nama_produk }}</option>
                                    @endforeach
                                </select>                             
                            </div>                                                              
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 2</label>
                            <input type="file" name="gambar2" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 3</label>
                            <input type="file" name="gambar3" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-start">
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="luas_bangunan">Luas Bangunan</label>
                            <input type="number" class="form-control" name="luas_bangunan" id="luas_bangunan" required>
                        </div>
                        <div class="flex-fill mr-3" style="max-width: 50%;">
                            <label for="gambar">Unggah Gambar 4</label>
                            <input type="file" name="gambar4" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" style="background-color: #0088FF; color: white">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
@foreach($portofolio as $item)
    <div class="modal fade" id="editPortoModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editPortoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPortoModalLabel">Edit Portofolio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.portofolio.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" value="{{ old('nama_pemesan', $item->nama) }}" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                                <input type="file" name="gambar1" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <select class="form-control" name="nama_produk" id="nama_produk" required>
                                        @foreach($produk as $produkItem)
                                            <option value="{{ $produkItem->id }}" 
                                                {{ (old('nama_produk', $item->id_produk) == $produkItem->id) ? 'selected' : '' }}>
                                                {{ $produkItem->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>                                                                                                            
                                </div>                                                              
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 2</label>
                                <input type="file" name="gambar2" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($item->tgl_selesai)->format('Y-m-d')) }}" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 3</label>
                                <input type="file" name="gambar3" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-start">
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="number" class="form-control" name="luas_bangunan" id="luas_bangunan" value="{{ old('luas_bangunan', $item->luas) }}" required>
                            </div>
                            <div class="flex-fill mr-3" style="max-width: 50%;">
                                <label for="gambar">Unggah Gambar 4</label>
                                <input type="file" name="gambar4" class="form-control-file" accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>

                        <!-- Gambar Lama -->
                        @if($item->gambarPortofolio->count() > 0)
                            <div class="form-group">
                                <label for="gambarLama">Gambar Lama</label>
                                <div class="d-flex">
                                    @foreach($item->gambarPortofolio as $gambar)
                                        <img src="{{ asset('storage/portofolio/' . $gambar->gambar) }}" class="img-thumbnail" width="100">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" style="background-color: #0088FF; color: white">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
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
</script>
@endsection