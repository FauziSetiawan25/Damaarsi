@extends('layout')

@section('title', 'Catalog')

@section('content')
    <div class="catalog-background mb-5">
        <div class="container py-5">
            <!-- Line Above -->
            <div class="line-horizontal"></div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <!-- Left-aligned Logo and Text with Lines -->
                <div class="d-flex align-items-center my-2">
                    <img src="/images/logo3.png" alt="logo damaarsi" class="logo">
                    <div class="ml-2 text-left">
                        <h6 class="mb-0 font-weight-bold">Katalog</h6>
                        <h6 class="mb-0">Desain</h6>
                    </div>
                </div>
                <form class="d-flex search-bar ms-auto">
                    <div class="input-group">
                        <input class="form-control custom-border" type="search" placeholder="Search...">
                        <button type="submit" class="btn btn-outline-secondary search-btn"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- Line Below -->
            <div class="line-horizontal mb-2"></div>
        </div>
        <div class="container-fluid p-0">
            <!-- Intro Section -->
            <div class="card mt-0 w-100" style="border-radius: 20px">
                <div class="text-left mb-4 py-3 px-5">
                    <h5 class="fw-semibold">Berbagai Pilihan Paket Desain Sesuai Kebutuhan Anda!</h5>
                    <div class="d-flex align-items-center gap-2 mt-2">
                        <p class="mb-0" style="font-size: 16px">Selengkapnya</p>
                        <a href="{{ route('package') }}" class="btn btn-primary btn-sm">Lihat Opsi Paket</a>
                    </div>
                </div>
            </div>
            <div class="card mt-3" style="border-radius: 20px">
                <section class="px-5 py-3">
                    <h2>Katalog Desain</h2>
                    {{-- <div class="row mt-4">
                        @foreach ($designs as $design)
                            <div class="col-md-4 mb-4">
                                <div class="card custom-card-catalog">
                                    <a href="{{ route('design.detail', 1) }}">
                                        <img src="{{ asset($design['image']) }}" class="card-img-top"
                                            alt="{{ $design['title'] }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $design['title'] }}</h5>

                                        <div class="d-flex align-items-center gap-2">
                                            <img src="/images/money.png" alt="price" style="width: 24px; height: 24px;">
                                            <div style="line-height: 1;">
                                                <span class="text-muted d-block" style="font-size: 12px">mulai dari</span>
                                                <span>Rp {{ number_format($design['price'], 0, ',', '.') }} <span
                                                        class="text-muted">/m2</span></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="row mt-4" id="designCatalogContainer">
                        <!-- Konten akan dimuat di sini -->
                    </div>
                </section>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/produk')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('designCatalogContainer');
                    container.innerHTML = ''; // Kosongkan kontainer dulu

                    const designs = data.data.filter(item => item.tipe === 'Desain');

                    if (!designs || designs.length === 0) {
                        container.innerHTML = `
                    <div class="col-12">
                        <p class="text-center">Tidak ada desain tersedia.</p>
                    </div>
                `;
                        return;
                    }

                    designs.forEach(design => {
                        const firstImage = design.gambar_produk.length > 0 ? design.gambar_produk[0]
                            .gambar : null;
                        const imageUrl = firstImage ? `/storage/produk/${firstImage}` :
                            '/images/no-image.jpg'; // fallback jika tidak ada gambar

                        const cardHTML = `
                    <div class="col-md-4 mb-4">
                        <div class="card custom-card-catalog">
                            <a href="/catalog/design/${design.id}">
                                <img src="${imageUrl}" class="card-img-top" alt="${design.nama_produk}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">${design.nama_produk}</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/images/money.png" alt="price" style="width: 24px; height: 24px;">
                                    <div style="line-height: 1;">
                                        <span class="text-muted d-block" style="font-size: 12px">mulai dari</span>
                                        <span>Rp ${new Intl.NumberFormat('id-ID').format(design.harga)} <span class="text-muted">/m2</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                        container.innerHTML += cardHTML;
                    });
                })
                .catch(error => {
                    console.error('Gagal memuat desain:', error);
                });
        });
    </script>

@endsection
