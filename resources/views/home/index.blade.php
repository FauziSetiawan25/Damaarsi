@extends('layout')

@section('title', 'index')

@section('content')
    <div class="index-background">
        <div class="container-fluid p-0">
            <!-- Carousel Banner Section -->
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500">
                <div class="carousel-inner">
                    @foreach ($carouselItems as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row d-flex align-items-center"
                                style="background-color: #21443a; color: white; padding: 5rem;">
                                <div class="col-md-6">
                                    <h1 class="custom-text">{{ $item['title'] }}</h1>
                                    <p class="custom-text">{{ $item['description'] }}</p>
                                    <a href="{{ route('design.detail', 1) }}" class="btn btn-light">Selengkapnya</a>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <div class="carousel-inner">
                        @foreach ($recommendations as $index => $recommendation)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <div class="card mt-4 custom-card-recommendations">
                                            <img src="{{ $recommendation['image'] }}" class="card-img-top"
                                                alt="{{ $recommendation['title'] }}">
                                            <div class="hover-title text-left">
                                                <h5>{{ $recommendation['title'] }}</h5>
                                                {{-- <hr>
                                                <a href="{{ route('design.detail', 1) }}"
                                                    class="btn btn-outline-success">Detail Desain<i
                                                        class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($recommendations[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-recommendations">
                                                <img src="{{ $recommendations[$index + 1]['image'] }}" class="card-img-top"
                                                    alt="{{ $recommendations[$index + 1]['title'] }}">
                                                <div class="hover-title text-left">
                                                    <h5>{{ $recommendations[$index + 1]['title'] }}</h5>
                                                    {{-- <hr>
                                                    <a href="{{ route('design.detail', 1) }}"
                                                        class="btn btn-outline-success">Detail Desain<i
                                                            class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (isset($recommendations[$index + 2]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-recommendations">
                                                <img src="{{ $recommendations[$index + 2]['image'] }}" class="card-img-top"
                                                    alt="{{ $recommendation['title'] }}">
                                                <div class="hover-title text-left">
                                                    <h5>{{ $recommendation['title'] }}</h5>
                                                    {{-- <hr>
                                                    <a href="{{ route('design.detail', 1) }}"
                                                        class="btn btn-outline-success">Detail Desain<i
                                                            class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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
                <div class="row mt-4">
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
                    <div class="carousel-inner">
                        @foreach ($designPackages as $index => $designPackage)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <div class="card mt-4 custom-card-packages">
                                            <img src="{{ $designPackage['image'] }}" class="card-img-top"
                                                alt="{{ $designPackage['title'] }}">
                                            <div class="hover-title text-left">
                                                <h5>{{ $designPackage['title'] }}</h5>
                                                {{-- <hr>
                                                <a href="{{ route('design.detail', 1) }}"
                                                    class="btn btn-outline-success">Detail Desain<i
                                                        class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($designPackages[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-packages">
                                                <img src="{{ $designPackages[$index + 1]['image'] }}"
                                                    class="card-img-top"
                                                    alt="{{ $designPackages[$index + 1]['title'] }}">
                                                <div class="hover-title text-left">
                                                    <h5>{{ $designPackages[$index + 1]['title'] }}</h5>
                                                    {{-- <hr>
                                                    <a href="{{ route('design.detail', 1) }}"
                                                        class="btn btn-outline-success">Detail Desain<i
                                                            class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (isset($designPackages[$index + 2]) && $index % 3 === 0)
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="card mt-4 custom-card-packages">
                                                <img src="{{ $designPackages[$index + 2]['image'] }}"
                                                    class="card-img-top" alt="{{ $designPackage['title'] }}">
                                                <div class="hover-title text-left">
                                                    <h5>{{ $designPackage['title'] }}</h5>
                                                    {{-- <hr>
                                                    <a href="{{ route('design.detail', 1) }}"
                                                        class="btn btn-outline-success">Detail Desain<i
                                                            class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- Close row -->

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
                <div class="row mt-4">
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
                    <div class="carousel-inner">
                        @foreach ($latestProjects as $index => $latestProject)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-4 custom-card-portofolio">
                                            <img src="{{ $latestProject['image'] }}" class="card-img-top"
                                                alt="{{ $latestProject['title'] }}">
                                            <div class="hover-title text-left">
                                                <h5>{{ $latestProject['title'] }}</h5>
                                                {{-- <hr>
                                                <a href="{{ route('design.detail', 1) }}"
                                                    class="btn btn-outline-success">Detail Desain<i
                                                        class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Show additional cards in the same slide only on medium and larger screens -->
                                    @if (isset($latestProjects[$index + 1]) && $index % 3 === 0)
                                        <div class="col-md-6 d-none d-md-block">
                                            <div class="card mt-4 custom-card-portofolio">
                                                <img src="{{ $latestProjects[$index + 1]['image'] }}"
                                                    class="card-img-top"
                                                    alt="{{ $latestProjects[$index + 1]['title'] }}">
                                                <div class="hover-title text-left">
                                                    <h5>{{ $latestProjects[$index + 1]['title'] }}</h5>
                                                    {{-- <hr>
                                                    <a href="{{ route('design.detail', 1) }}"
                                                        class="btn btn-outline-success">Detail Desain<i
                                                            class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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

            <!-- Testimonial Section -->
            <section class="testimonial my-5">
                <h3>Testimonial</h3>
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        @foreach ($testimonials as $index => $testimonial)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row align-items-center p-4" style="background-color: #2C2C2C;">
                                    <div class="col-md-8">
                                        <h4><strong>{{ $testimonial['name'] }}</strong></h4>
                                        <p>{{ $testimonial['text'] }}</p>
                                    </div>
                                    <div class="col-md-4 image-container">
                                        <img src="{{ $testimonial['image'] }}" alt="Testimonial Image"
                                            class="card-img-bottom">
                                    </div>
                                </div>
                                <!-- Custom Previous and Next Buttons -->
                                <div class="testimonial-controls position-absolute" style="bottom: 10px; left: 10px;">
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
                        @endforeach
                    </div>
                </div>
            </section>

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

            <!-- Floating WhatsApp Button -->
            <a href="https://wa.me/yourwhatsappphonenumber" target="_blank" class="btn-whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>



        </div>
    </div>

@endsection
