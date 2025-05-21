@extends('layout')

@section('title', 'Portofolio')

@section('content')
    <div class="portofolio-background">
        <div class="container pt-4 pb-5">
            <!-- Line Above -->
            <div class="line-horizontal"></div>

            <!-- Left-aligned Logo and Text with Lines -->
            <div class="d-flex align-items-center my-2">
                <img src="/images/logo3.png" alt="logo damaarsi" class="logo">
                <div class="ml-2 text-left">
                    <h6 class="mb-0 font-weight-bold">Portofolio</h6>
                    <h6 class="mb-0">Design</h6>
                </div>
            </div>

            <!-- Line Below -->
            <div class="line-horizontal mb-2"></div>

            <!-- Card Section -->
            {{-- <div class="row mt-4">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-6">
                        <div class="card mt-4 custom-card-portofoliopage">
                            <a href="{{ route('portofolio.detail', 1) }}">
                                <img src="{{ $portfolio['image'] }}" class="card-img-top img-cover" alt="{{ $portfolio['title'] }}">
                            </a>
                            <div class="hover-title text-left"><h5>{{ $portfolio['title'] }}</h5></div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
            <div class="row mt-4" id="portofolioContainer">
                <!-- Konten akan dimuat di sini -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/portofolio')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('portofolioContainer');
                    container.innerHTML = ''; // Kosongkan dulu kontainer

                    const portofolios = data.data.sort((a, b) => new Date(b.created_at) - new Date(a
                        .created_at)); // Ambil data portofolio

                    if (!portofolios || portofolios.length === 0) {
                        container.innerHTML = `
                    <div class="col-12">
                        <p class="text-center">Tidak ada portofolio tersedia.</p>
                    </div>
                `;
                        return;
                    }

                    portofolios.forEach(portofolio => {
                        // Ambil gambar pertama jika tersedia
                        const firstImage = portofolio.gambar_portofolio.length > 0 ?
                            portofolio.gambar_portofolio[0].gambar :
                            null;
                        const imageUrl = firstImage ?
                            `/storage/portofolio/${firstImage}` :
                            '/images/no-image.jpg'; // fallback jika tidak ada gambar

                        const cardHTML = `
                    <div class="col-md-6">
                        <div class="card mt-4 custom-card-portofoliopage">
                            <a href="/portofolio/detail/${portofolio.id}">
                                <img src="${imageUrl}" class="card-img-top img-cover" alt="${portofolio.nama}">
                            </a>
                            <div class="hover-title text-left"><h5>${portofolio.nama}</h5></div>
                        </div>
                    </div>
                `;
                        container.innerHTML += cardHTML;
                    });
                })
                .catch(error => console.error('Gagal memuat portofolio:', error));
        });
    </script>


@endsection
