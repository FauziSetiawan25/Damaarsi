@extends('layout')

@section('title', 'index')

@section('content')
    <div class="index-background">
        <div class="container-fluid p-0">
            <!-- Carousel Banner Section -->
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500">
                <div class="carousel-inner" id="carouselItemsContainer">
                    <!-- item carousel akan diisi oleh JS -->
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev banner-control-prev" type="button" data-bs-target="#bannerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next banner-control-next" type="button" data-bs-target="#bannerCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="container">
            <!-- Information Section -->
            <section class="info my-4">
                <h2>WUJUDKAN DESAIN BANGUNAN IMPIAN ANDA BERSAMA KAMI!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt pharetra efficitur.</p>
            </section>

            <!-- Design Recommendations Carousel Section -->
            <section class="recommendations my-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Rekomendasi Desain</h3>
                    <a href="/catalog" class="btn btn-outline-success">Lihat Semua<i class="fas fa-arrow-right"
                            style="margin-left: 5px;"></i></a>
                </div>
                <div id="recommendationCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                    {{-- <div class="carousel-inner">
                        @foreach ($recommendations as $index => $recommendation)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <div class="card mt-4 custom-card-recommendations">
                                            <a href="{{ route('design.detail', $recommendation['id']) }}"><img
                                                    src="{{ $recommendation['image'] }}" class="card-img-top"
                                                    alt="{{ $recommendation['title'] }}"></a>

                                            <div class="hover-title text-left">
                                                <h5>{{ $recommendation['title'] }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($recommendations[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-recommendations">
                                                <a href="{{ route('design.detail', $recommendation['id']) }}"><img
                                                        src="{{ $recommendation['image'] }}" class="card-img-top"
                                                        alt="{{ $recommendation['title'] }}"></a>
                                                <div class="hover-title text-left">
                                                    <h5>{{ $recommendations[$index + 1]['title'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (isset($recommendations[$index + 2]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-recommendations">
                                                <a href="{{ route('design.detail', $recommendation['id']) }}"><img
                                                        src="{{ $recommendation['image'] }}" class="card-img-top"
                                                        alt="{{ $recommendation['title'] }}"></a>
                                                <div class="hover-title text-left">
                                                    <h5>{{ $recommendation['title'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> --}}

                    <div class="carousel-inner" id="recommendationItemsContainer">
                        <!-- Item carousel akan dimuat di sini -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4">
                                    <div class="card mt-4 custom-card-recommendations">
                                        <a href="#"><img src="#" class="card-img-top" alt="Loading..."></a>
                                        <div class="hover-title text-left">
                                            <h5>Loading...</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#recommendationCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#recommendationCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <!-- Why Choose Us Section -->
            <section class="why-choose-us my-4 mt-4">
                <h3>Mengapa Harus Memilih Kami?</h3>
                {{-- <div class="row mt-4">
                    @foreach ($whyChooseUs as $reason)
                        <div class="col-md-3 d-flex mt-4">
                            <div class="card flex-fill overflow-hidden">
                                <div
                                    class="card-body text-center {{ $loop->index % 2 == 0 ? 'bg-dark-green' : 'bg-white' }}">
                                    <img src="{{ $reason['icon'] }}" alt="Icon" class="rounded-circle mb-3"
                                        style="width: 50px; height: 50px;">
                                    <h5>{{ $reason['title'] }}</h5>
                                    <p>{{ $reason['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="row mt-4" id="whyChooseUsContainer">
                    <!-- Konten akan dimuat di sini -->
                </div>
            </section>

            <!-- Design Packages Section -->
            <section class="design-packages my-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Desain Interior</h3>
                    <a href="/catalog" class="btn btn-outline-success">
                        Lihat Semua<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                    </a>
                </div>
                <div id="designPackageCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                    {{-- <div class="carousel-inner">
                        @foreach ($designPackages as $index => $designPackage)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <div class="card mt-4 custom-card-packages">
                                            <a href="{{ route('design.detail', $designPackage['id']) }}">
                                                <img src="{{ $designPackage['image'] }}" class="card-img-top"
                                                    alt="{{ $designPackage['title'] }}">
                                            </a>

                                            <div class="hover-title text-left">
                                                <h5>{{ $designPackage['title'] }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($designPackages[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-packages">
                                                <a href="{{ route('design.detail', $designPackage['id']) }}">
                                                    <img src="{{ $designPackage['image'] }}" class="card-img-top"
                                                        alt="{{ $designPackage['title'] }}">
                                                </a>
                                                <div class="hover-title text-left">
                                                    <h5>{{ $designPackages[$index + 1]['title'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (isset($designPackages[$index + 2]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-packages">
                                                <a href="{{ route('design.detail', $designPackage['id']) }}">
                                                    <img src="{{ $designPackage['image'] }}" class="card-img-top"
                                                        alt="{{ $designPackage['title'] }}">
                                                </a>
                                                <div class="hover-title text-left">
                                                    <h5>{{ $designPackage['title'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- Close row --> --}}
                    <div class="carousel-inner" id="designPackageItemsContainer">
                        <!-- Item carousel akan dimuat di sini -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4">
                                    <div class="card mt-4 custom-card-packages">
                                        <a href="#"><img src="#" class="card-img-top" alt="Loading..."></a>
                                        <div class="hover-title text-left">
                                            <h5>Loading...</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#designPackageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#designPackageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <!-- Layanan Section -->
            <section class="layanan my-4 mt-4">
                <h3>Layanan Kami</h3>
                {{-- <div class="row mt-4">
                    @foreach ($layananKami as $layanan)
                        <div class="col-md-4 d-flex mt-4">
                            <div class="card flex-fill overflow-hidden">
                                <div
                                    class="card-body text-center {{ $loop->index % 2 == 0 ? 'bg-dark-green' : 'bg-white' }}">
                                    <img src="{{ $layanan['icon'] }}" alt="Icon" class="rounded-circle mb-3"
                                        style="width: 100px; height: 100px;">
                                    <h5>{{ $layanan['title'] }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="row mt-4" id="layananContainer">
                    <!-- Konten akan dimuat di sini -->
                </div>
            </section>


            <!-- Latest Projects Section -->
            <section class="latest-projects my-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Projek Terbaru Kami</h3>
                    <a href="/portofolio" class="btn btn-outline-success">
                        Lihat Semua<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                    </a>
                </div>
                <div id="latestProjectCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                    {{-- <div class="carousel-inner">
                        @foreach ($latestProjects as $index => $latestProject)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-4 custom-card-portofolio">
                                            <a href="{{ route('portofolio.detail', $latestProject['id']) }}">
                                                <img src="{{ $latestProject['image'] }}" class="card-img-top"
                                                    alt="{{ $latestProject['title'] }}">
                                            </a>

                                            <div class="hover-title text-left">
                                                <h5>{{ $latestProject['title'] }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($latestProjects[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-6 d-none d-md-block">
                                            <div class="card mt-4 custom-card-portofolio">
                                                <a href="{{ route('portofolio.detail', $latestProject['id']) }}">
                                                    <img src="{{ $latestProject['image'] }}" class="card-img-top"
                                                        alt="{{ $latestProject['title'] }}">
                                                </a>
                                                <div class="hover-title text-left">
                                                    <h5>{{ $latestProjects[$index + 1]['title'] }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> --}}

                    <div class="carousel-inner" id="latestProjectItemsContainer">
                        <!-- Item carousel akan dimuat di sini -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="card mt-4 custom-card-portofolio">
                                        <a href="#"><img src="#" class="card-img-top" alt="Loading..."></a>
                                        <div class="hover-title text-left">
                                            <h5>Loading...</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#latestProjectCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#latestProjectCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
        </div>

        <div class="container-fluid p-0">
            <!-- Testimonial Section -->
            <section class="testimonial my-5">
                <div class="container">
                    <h3>Testimonial</h3>
                </div>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    {{-- <div class="carousel-inner">
                        @foreach ($testimonials as $index => $testimonial)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch px-0"
                                    style="background-color: #2C2C2C;">
                                    <div class="container">
                                        <div class="col-12 col-md-8 p-5 p-md-5">
                                            <h4><strong>{{ $testimonial['name'] }}</strong></h4>
                                            <p style="max-width: 600px">{{ $testimonial['text'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 image-container p-0 m-0 align-self-end">
                                        <img src="{{ $testimonial['image'] }}" alt="Testimonial Image"
                                            class="img-fluid w-100 h-100"
                                            style="object-fit: cover; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    </div>
                                </div>
                                <!-- Custom Previous and Next Buttons -->
                                <div class="container">
                                    <div class="testimonial-controls position-absolute w-100 d-flex justify-content-center justify-content-md-start mt-2"
                                        style="bottom: 20px;">
                                        <button class="btn btn-prev" type="button" data-bs-target="#testimonialCarousel"
                                            data-bs-slide="prev">
                                            <i class="bi bi-caret-left-fill"></i>
                                        </button>
                                        <button class="btn btn-next" type="button" data-bs-target="#testimonialCarousel"
                                            data-bs-slide="next">
                                            <i class="bi bi-caret-right-fill"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div> --}}

                    <div class="carousel-inner" id="testimonialContainer">
                        <!-- Konten akan dimuat di sini -->
                    </div>
                </div>
            </section>
        </div>

        <div class="container">
            <!-- Call to Action Section -->
            <section class="call-to-action my-5 text-start">
                <h2 class="text-uppercase font-weight-bold custom-text">Tunggu Apa Lagi Segera Wujudkan Desain Hunian
                    Anda Sekarang!</h2>
                <p>Buat ruangan Anda lebih dari sekadar tempat tinggal. Hubungi kami hari ini dan wujudkan ide arsitektur
                    yang
                    mencerminkan jati diri Anda!</p>
            </section>

            <!-- FAQ Section -->
            <section class="faq mt-4 py-4">
                <h3>FAQ</h3>
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>


        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/yourwhatsappphonenumber" target="_blank" class="btn-whatsapp">
            <i class="fab fa-whatsapp"></i>
        </a>



    </div>
    </div>

    {{-- Banner Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/banner')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('carouselItemsContainer');
                    container.innerHTML = ''; // kosongkan dulu

                    const activeBanners = data.banners.filter(banner => banner.status === 'aktif');

                    activeBanners.forEach((item, index) => {
                        const gambarUrl = item.gambar.startsWith('http') || item.gambar.startsWith(
                                '/') ?
                            item.gambar :
                            "{{ asset('storage/banner') }}/" + item.gambar;

                        const div = document.createElement('div');
                        div.className = 'carousel-item' + (index === 0 ? ' active' : '');
                        div.innerHTML = `
                    <div class="row d-flex align-items-center" style="background-color: #21443a; color: white; padding: 5rem; height: 100vh">
                        <div class="col-md-6">
                            <h1 class="custom-text">${item.title}</h1>
                            <p class="custom-text">${item.deskripsi}</p>
                            <a href="${item.link}" class="btn btn-light" target="_blank">Selengkapnya</a>
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="${gambarUrl}" alt="${item.title}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        </div>
                    </div>`;
                        container.appendChild(div);
                    });
                })
                .catch(error => console.error('Gagal memuat banner:', error));
        });
    </script>

    {{-- Rekomendasi Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const recommendationCarousel = document.getElementById('recommendationCarousel');
            if (!recommendationCarousel) return;

            const container = recommendationCarousel.querySelector('.carousel-inner');
            if (!container) return;

            fetch('/api/produk')
                .then(res => res.json())
                .then(data => {
                    container.innerHTML = '';

                    if (!data.data || data.data.length === 0) {
                        container.innerHTML = `<div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p class="text-center">Tidak ada rekomendasi desain tersedia.</p>
                        </div>
                    </div>
                </div>`;
                        return;
                    }

                    // Tentukan jumlah item per slide tergantung lebar layar
                    const isMobile = window.innerWidth < 768;
                    const itemsPerSlide = isMobile ? 1 : 3;

                    for (let i = 0; i < data.data.length; i += itemsPerSlide) {
                        const group = data.data.slice(i, i + itemsPerSlide);
                        const carouselItem = document.createElement('div');
                        carouselItem.className = 'carousel-item' + (i === 0 ? ' active' : '');

                        let innerHTML = '<div class="row justify-content-center">';

                        group.forEach(item => {
                            const gambarUrl = item.gambar_produk && item.gambar_produk.length > 0 ?
                                '/storage/produk/' + item.gambar_produk[0].gambar :
                                '';

                            innerHTML += `
                        <div class="col-12 ${!isMobile ? 'col-md-6 col-xl-4' : ''}">
                            <div class="card mt-4 custom-card-recommendations">
                                <a href="/design/detail/${item.id}">
                                    <img src="${gambarUrl}" class="card-img-top" alt="${item.nama_produk}">
                                </a>
                                <div class="hover-title text-left">
                                    <h5>${item.nama_produk}</h5>
                                </div>
                            </div>
                        </div>
                    `;
                        });

                        innerHTML += '</div>';
                        carouselItem.innerHTML = innerHTML;
                        container.appendChild(carouselItem);
                    }
                })
                .catch(err => {
                    console.error('Gagal memuat data rekomendasi:', err);
                });
        });
    </script>

    {{-- Why Choose Us Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/memilih')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('whyChooseUsContainer');
                    container.innerHTML = ''; // Kosongkan dulu kontainer

                    const memilihItems = data.data; // Ambil data alasan memilih

                    if (!memilihItems || memilihItems.length === 0) {
                        container.innerHTML = `
                    <div class="col-12">
                        <p class="text-center">Tidak ada data alasan memilih tersedia.</p>
                    </div>
                `;
                        return;
                    }

                    memilihItems.forEach((item, index) => {
                        const gambarUrl = item.gambar.startsWith('http') || item.gambar.startsWith(
                                '/') ?
                            item.gambar :
                            "{{ asset('storage/memilih') }}/" + item.gambar;

                        const cardHTML = `
                    <div class="col-md-3 d-flex mt-4">
                        <div class="card flex-fill overflow-hidden">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center ${index % 2 === 0 ? 'bg-dark-green' : 'bg-white'}">
                                <img src="${gambarUrl}" alt="${item.title}" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                                <h5>${item.title}</h5>
                            </div>
                        </div>
                    </div>
                `;
                        container.innerHTML += cardHTML;
                    });
                })
                .catch(error => console.error('Gagal memuat data alasan memilih:', error));
        });
    </script>

    {{-- Interior section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const designPackageCarousel = document.getElementById('designPackageCarousel');
            if (!designPackageCarousel) return;

            const container = designPackageCarousel.querySelector('.carousel-inner');
            if (!container) return;

            fetch('/api/produk')
                .then(res => res.json())
                .then(data => {
                    container.innerHTML = '';

                    if (!data.data || data.data.length === 0) {
                        container.innerHTML = `<div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p class="text-center">Tidak ada rekomendasi desain tersedia.</p>
                        </div>
                    </div>
                </div>`;
                        return;
                    }

                    // Tentukan jumlah item per slide tergantung lebar layar
                    const isMobile = window.innerWidth < 768;
                    const itemsPerSlide = isMobile ? 1 : 3;

                    for (let i = 0; i < data.data.length; i += itemsPerSlide) {
                        const group = data.data.slice(i, i + itemsPerSlide);
                        const carouselItem = document.createElement('div');
                        carouselItem.className = 'carousel-item' + (i === 0 ? ' active' : '');

                        let innerHTML = '<div class="row justify-content-center">';

                        group.forEach(item => {
                            const gambarUrl = item.gambar_produk && item.gambar_produk.length > 0 ?
                                '/storage/produk/' + item.gambar_produk[0].gambar :
                                '';

                            innerHTML += `
                        <div class="col-12 ${!isMobile ? 'col-md-6 col-xl-4' : ''}">
                            <div class="card mt-4 custom-card-packages">
                                <a href="/design/detail/${item.id}">
                                    <img src="${gambarUrl}" class="card-img-top" alt="${item.nama_produk}">
                                </a>
                                <div class="hover-title text-left">
                                    <h5>${item.nama_produk}</h5>
                                </div>
                            </div>
                        </div>
                    `;
                        });

                        innerHTML += '</div>';
                        carouselItem.innerHTML = innerHTML;
                        container.appendChild(carouselItem);
                    }
                })
                .catch(err => {
                    console.error('Gagal memuat data rekomendasi:', err);
                });
        });
    </script>

    {{-- Layanan Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/layanan')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('layananContainer');
                    container.innerHTML = ''; // Kosongkan dulu kontainer

                    const layananItems = data.data; // Ambil data layanan

                    if (!layananItems || layananItems.length === 0) {
                        container.innerHTML = `
                    <div class="col-12">
                        <p class="text-center">Tidak ada layanan tersedia.</p>
                    </div>
                `;
                        return;
                    }

                    layananItems.forEach((item, index) => {
                        const gambarUrl = item.gambar.startsWith('http') || item.gambar.startsWith(
                                '/') ?
                            item.gambar :
                            "{{ asset('storage/layanan') }}/" + item.gambar;

                        const cardHTML = `
                    <div class="col-md-4 d-flex mt-4">
                        <div class="card flex-fill overflow-hidden">
                            <div class="card-body text-center ${index % 2 === 0 ? 'bg-dark-green' : 'bg-white'}">
                                <img src="${gambarUrl}" alt="Icon" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                                <h5>${item.title}</h5>
                            </div>
                        </div>
                    </div>
                `;
                        container.innerHTML += cardHTML;
                    });
                })
                .catch(error => console.error('Gagal memuat layanan:', error));
        });
    </script>

    {{-- Latest Projects Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const latestProjectCarousel = document.getElementById('latestProjectCarousel');
            if (!latestProjectCarousel) return;

            const container = latestProjectCarousel.querySelector('.carousel-inner');
            if (!container) return;

            fetch('/api/portofolio')
                .then(res => res.json())
                .then(data => {
                    container.innerHTML = '';

                    if (!data.data || data.data.length === 0) {
                        container.innerHTML = `
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <p class="text-center">Tidak ada portofolio tersedia.</p>
                                </div>
                            </div>
                        </div>`;
                        return;
                    }

                    const portofolios = data.data;

                    for (let i = 0; i < portofolios.length; i++) {
                        const item = portofolios[i];
                        const nextItem = portofolios[i + 1];

                        const gambarUrl1 = item.gambar_portofolio?.[0]?.gambar ?
                            `/storage/portofolio/${item.gambar_portofolio[0].gambar}` :
                            '';

                        const gambarUrl2 = nextItem?.gambar_portofolio?.[0]?.gambar ?
                            `/storage/portofolio/${nextItem.gambar_portofolio[0].gambar}` :
                            '';

                        const slide = document.createElement('div');
                        slide.className = 'carousel-item' + (i === 0 ? ' active' : '');

                        let slideHTML = `
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="card mt-4 custom-card-portofolio">
                                    <a href="/design/detail/${item.id}">
                                        <img src="${gambarUrl1}" class="card-img-top" alt="${item.nama}">
                                    </a>
                                    <div class="hover-title text-left">
                                        <h5>${item.nama}</h5>
                                    </div>
                                </div>
                            </div>`;

                        if (i % 3 === 0 && nextItem) {
                            slideHTML += `
                            <div class="col-md-6 d-none d-md-block">
                                <div class="card mt-4 custom-card-portofolio">
                                    <a href="/design/detail/${nextItem.id}">
                                        <img src="${gambarUrl2}" class="card-img-top" alt="${nextItem.nama}">
                                    </a>
                                    <div class="hover-title text-left">
                                        <h5>${nextItem.nama}</h5>
                                    </div>
                                </div>
                            </div>`;
                            i++; // Loncat karena nextItem sudah ditampilkan
                        }

                        slideHTML += `</div>`;
                        slide.innerHTML = slideHTML;
                        container.appendChild(slide);
                    }
                })
                .catch(err => {
                    console.error('Gagal memuat data portofolio:', err);
                });
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/testimoni')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('testimonialContainer');
                container.innerHTML = ''; // Kosongkan dulu kontainer

                const testimonials = data.data; // Ambil data testimoni

                if (!testimonials || testimonials.length === 0) {
                    container.innerHTML = `
                        <div class="carousel-item active">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch px-0"
                                style="background-color: #2C2C2C;">
                                <div class="container">
                                    <div class="col-12 col-md-8 p-5 p-md-5">
                                        <h4><strong>Tidak ada testimoni tersedia.</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                testimonials.forEach((testimonial, index) => {
                    const gambarUrl = testimonial.gambar.startsWith('http') || testimonial.gambar.startsWith('/')
                        ? testimonial.gambar
                        : "{{ asset('storage/testimoni') }}/" + testimonial.gambar;

                    const carouselItem = `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch px-0"
                                style="background-color: #2C2C2C; height: 50vh">
                                <div class="container">
                                    <div class="col-12 col-md-8 p-5 p-md-5">
                                        <h4><strong>${testimonial.nama}</strong></h4>
                                        <p style="max-width: 600px">${testimonial.testimoni}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 image-container p-0 m-0 align-self-end">
                                    <img src="${gambarUrl}" alt="Testimonial Image"
                                        class="img-fluid w-100 h-100"
                                        style="object-fit: cover; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                </div>
                            </div>
                            <!-- Custom Previous and Next Buttons -->
                            <div class="container">
                                <div class="testimonial-controls position-absolute w-100 d-flex justify-content-center justify-content-md-start mt-2"
                                    style="bottom: 20px;">
                                    <button class="btn btn-prev" type="button" data-bs-target="#testimonialCarousel"
                                        data-bs-slide="prev">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </button>
                                    <button class="btn btn-next" type="button" data-bs-target="#testimonialCarousel"
                                        data-bs-slide="next">
                                        <i class="bi bi-caret-right-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    container.innerHTML += carouselItem;
                });
            })
            .catch(error => console.error('Gagal memuat testimoni:', error));
    });
</script>



@endsection
