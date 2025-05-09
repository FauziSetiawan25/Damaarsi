@extends('layout')

@section('title', 'Portfolio Details')

@section('content')
    <div class="detailporto-background">
        <div class="container py-5">
            <!-- Tombol Kembali dan Label Kategori -->
            <div class="d-flex align-items-center mb-3">
                <a href="{{ url()->previous() }}" class="btn d-inline-flex align-items-center justify-content-center me-3"
                    style="background-color: #616161; color: white"><span class="material-symbols-outlined me-2">
                        undo
                    </span>Kembali</a>
                {{-- <span class="badge px-3 py-2"
                    style="background-color: #0A4833; font-size: 16px; font-weight:500; min-height:20px">Rumah
                    {{ $portfolio->owner_name }}</span> --}}
                <span class="badge px-3 py-2"
                    style="background-color: #0A4833; font-size: 16px; font-weight:500; min-height:20px;"
                    id="portofolioLocation"></span>
            </div>
            <div class="desc card p-3"
                style="background-color: #FBF9F9; border-radius: 10px; min-height: 200px; overflow-y: auto;">
                <h3>Deskripsi</h3>
                {{-- <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Gaya Rumah</div>
                    <div class="col-md-6">: {{ $portfolio->style }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Luas Bangunan</div>
                    <div class="col-md-6">: {{ $portfolio->area }} m<sup>2</sup></div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Tanggal Selesai</div>
                    <div class="col-md-6">: {{ $portfolio->completion_date->format('d/m/Y') }}</div>
                </div> --}}
                <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Gaya Rumah</div>
                    <div class="col-md-6" id="portofolioName"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Luas Bangunan</div>
                    <div class="col-md-6" id="portofolioArea"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3 font-weight-bold">Tanggal Selesai</div>
                    <div class="col-md-6" id="portofolioCompletionDate"></div>
                </div>

            </div>

            <!-- Image Gallery -->
            {{-- <div class="row mt-5">
                @foreach ($portfolio->images as $image)
                    <div class="col-md-6 mb-4">
                        <img src="{{ $image->url }}" class="img-fluid w-100 rounded" alt="Portfolio Image">
                    </div>
                @endforeach
            </div> --}}
            <div class="row mt-5" id="portofolioImages">
                <!-- Gambar akan dimuat di sini -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pathSegments = window.location.pathname.split('/');
            const portofolioId = pathSegments[pathSegments.length - 1];

            fetch(`/api/portofolio/${portofolioId}`)
                .then(response => response.json())
                .then(data => {
                    const portofolio = data.data;

                    document.getElementById('portofolioLocation').innerText = portofolio.lokasi;
                    document.getElementById('portofolioName').innerText = `: ${portofolio.nama}`;
                    document.getElementById('portofolioArea').innerText = `: ${portofolio.luas} m²`;
                    document.getElementById('portofolioCompletionDate').innerText = `: ` + new Date(portofolio
                        .tgl_selesai).toLocaleDateString();

                    const imagesContainer = document.getElementById('portofolioImages');
                    imagesContainer.innerHTML = ''; // Kosongkan dulu

                    portofolio.gambar_portofolio.forEach(image => {
                        const imgHTML = `
                            <div class="col-md-6 mb-4">
                                <img src="/storage/portofolio/${image.gambar}" class="img-fluid w-100 rounded" alt="Portfolio Image">
                            </div>
                        `;
                        imagesContainer.innerHTML += imgHTML;
                    });
                })
                .catch(error => console.error('Gagal memuat detail portofolio:', error));
        });
    </script>


@endsection
