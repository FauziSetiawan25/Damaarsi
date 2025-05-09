@extends('layout')

@section('title', 'Package')

@section('content')
    <div class="package-background mb-5">
        <div class="container py-5">
            <!-- Line Above -->
            <div class="line-horizontal"></div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <!-- Left-aligned Logo and Text with Lines -->
                <div class="d-flex align-items-center my-2">
                    <img src="/images/logo3.png" alt="logo damaarsi" class="logo">
                    <div class="ml-2 text-left">
                        <h6 class="mb-0 font-weight-bold">Paket</h6>
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
                        <a href="/catalog" class="btn btn-primary btn-sm">Lihat Katalog Desain</a>
                    </div>
                </div>
            </div>
            <div class="card mt-3" style="border-radius: 20px">
                <section class="px-5 py-3">
                    <h2>Katalog Paket</h2>
                    {{-- <div class="row mt-4">
                        @foreach ($packages as $package)
                            <div class="col-md-4 mb-4">
                                <div class="card custom-card-package">
                                    <img src="{{ $package->image }}" class="card-img-top" alt="{{ $package->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $package->title }}</h5>
                                        <span class="text-muted d-block mb-2" style="font-size: 16px">Apa yang terdapat
                                            di dalam paket? </span>
                                        <span class="text-muted d-block" style="font-size: 16px">{{ $package->description }} </span>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="row mt-4" id="packageCatalogContainer">
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
                const container = document.getElementById('packageCatalogContainer');
                container.innerHTML = ''; // Kosongkan kontainer

                const packages = data.data.filter(product => product.tipe === 'Paket'); // Filter tipe Paket

                if (packages.length === 0) {
                    container.innerHTML = `
                        <div class="col-12">
                            <p class="text-center">Tidak ada paket tersedia.</p>
                        </div>
                    `;
                    return;
                }

                packages.forEach(product => {
                        const firstImage = product.gambar_produk.length > 0 ? product.gambar_produk[0]
                            .gambar : null;
                        const imageUrl = firstImage ? `/storage/produk/${firstImage}` :
                            '/images/no-image.jpg'; // fallback jika tidak ada gambar

                    const cardHTML = `
                        <div class="col-md-4 mb-4">
                            <div class="card custom-card-package">
                                <img src="${imageUrl}" class="card-img-top" alt="${product.nama_produk}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.nama_produk}</h5>
                                    <span class="text-muted d-block mb-2" style="font-size: 16px">Apa yang terdapat di dalam paket?</span>
                                    <span class="text-muted d-block" style="font-size: 16px">${product.deskripsi}</span>
                                </div>
                            </div>
                        </div>
                    `;
                    container.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Gagal memuat paket:', error));
    });
</script>


@endsection
