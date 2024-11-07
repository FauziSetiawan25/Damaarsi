@extends('layout')

@section('title', 'index')

@section('content')
<div class="container-fluid p-0">
  <!-- Carousel Banner Section -->
  <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      @foreach ($carouselItems as $index => $item)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
        <div class="row d-flex align-items-center" style="background-color: #21443a; color: white; padding: 5rem;">
          <div class="col-md-6">
            <h1 class="custom-text">{{ $item['title'] }}</h1>
            <p class="custom-text">{{ $item['description'] }}</p>
            <a href="#" class="btn btn-light">Selengkapnya</a>
          </div>
          <div class="col-md-6">
            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="img-fluid">
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- Carousel Controls -->
    <button class="carousel-control-prev banner-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next banner-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container">
  <!-- Information Section -->
  <section class="info my-4">
    <h2>Wujudkan Desain Bangunan Impian Anda Bersama Kami!</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt pharetra efficitur.</p>
  </section>

  <!-- Design Recommendations Carousel Section -->
  <section class="recommendations my-4">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="underline-heading">Rekomendasi Desain</h3>
      <a href="#" class="btn btn-outline-success">Lihat Semua<i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
    </div>
    <div id="recommendationCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach ($recommendations as $index => $recommendation)
        <div class="carousel-item {{ $index % 3 === 0 ? 'active' : '' }}">
          <div class="row">
            @for ($i = 0; $i < 3; $i++)
              @if (isset($recommendations[$index + $i]))
              <div class="col-md-4">
                <div class="card">
                  <img src="{{ $recommendations[$index + $i]['image'] }}" class="card-img-top" alt="{{ $recommendations[$index + $i]['title'] }}">
                  <div class="card-body text-left">
                    <h5>{{ $recommendations[$index + $i]['title'] }}</h5>
                    <hr>
                    <a href="#" class="btn btn-outline-success">Detail Desain<i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a> <!-- Ganti warna tombol -->
                  </div>
                </div>
              </div>
              @endif
            @endfor
          </div>
        </div>
        @endforeach
      </div>
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#recommendationCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#recommendationCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="why-choose-us my-4 mt-4">
    <h3 class="underline-heading">Mengapa Harus Memilih Kami?</h3>
    <div class="row mt-4">
      @foreach ($whyChooseUs as $reason)
      <div class="col-md-3 d-flex">
        <div class="card flex-fill">
          <div class="card-body text-center">
            <img src="{{ $reason['icon'] }}" alt="Icon" class="rounded-circle mb-3" style="width: 50px; height: 50px;">
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
        <h3 class="underline-heading">Paket Desain yang Kami Tawarkan</h3>
        <a href="#" class="btn btn-outline-success">
            Lihat Semua<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
        </a>
    </div>
    <div id="designPackageCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($designPackages as $index => $designPackage)
                @if ($index % 4 === 0)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row">
                @endif

                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $designPackage['image'] }}" class="card-img-top" alt="{{ $designPackage['title'] }}">
                        <div class="card-body text-left">
                            <h5>{{ $designPackage['title'] }}</h5>
                            <hr>
                            <a href="#" class="btn btn-outline-success">
                                Detail Paket<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @if ($index % 4 === 3 || $index === count($designPackages) - 1)
                        </div> <!-- Close row -->
                    </div> <!-- Close carousel-item -->
                @endif
            @endforeach
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#designPackageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#designPackageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </section>


  <!-- Latest Projects Section -->
  <section class="latest-projects my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="underline-heading">Projek Terbaru Kami</h3>
        <a href="#" class="btn btn-outline-success">
            Lihat Semua<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
        </a>
    </div>
    <div id="latestProjectCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($latestProjects as $index => $latestProject)
                @if ($index % 2 === 0)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row">
                @endif

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ $latestProject['image'] }}" class="card-img-top" alt="{{ $latestProject['title'] }}">
                        <div class="card-body text-left">
                            <h5>{{ $latestProject['title'] }}</h5>
                            <hr>
                            <a href="#" class="btn btn-outline-success">
                                Detail Portofolio<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @if ($index % 2 === 1 || $index === count($latestProjects) - 1)
                        </div> <!-- Close row -->
                    </div> <!-- Close carousel-item -->
                @endif
            @endforeach
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#latestProjectCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#latestProjectCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </section>

  <!-- Testimonial Section -->
  <section class="testimonial my-5">
    <h2 class="underline-heading">Testimonial</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($testimonials as $index => $testimonial)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row align-items-center p-4" style="background-color: #F5F3F3;">
                        <div class="col-md-8">
                            <h4><strong>{{ $testimonial['name'] }}</strong></h4>
                            <p>{{ $testimonial['text'] }}</p>
                        </div>
                        <div class="col-md-4 image-container">
                            <img src="{{ $testimonial['image'] }}" alt="Testimonial Image" class="card-img-bottom">
                        </div>
                    </div>
                    <!-- Custom Previous and Next Buttons -->
                    <div class="testimonial-controls position-absolute" style="bottom: 10px; left: 10px;">
                      <button class="btn btn-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                          <i class="bi bi-caret-left-fill"></i>
                      </button>
                      <button class="btn btn-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
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
  <h2 class="text-uppercase font-weight-bold" style="color: #0A4833;">Tunggu Apa Lagi Segera Wujudkan Desain Hunian Anda Sekarang!</h2>
  <p>Buat ruangan Anda lebih dari sekadar tempat tinggal. Hubungi kami hari ini dan wujudkan ide arsitektur yang mencerminkan jati diri Anda!</p>
</section>

<!-- FAQ Section -->
<section class="faq my-4">
  <h3 class="underline-heading">FAQ</h3>
  <div class="accordion" id="faqAccordion">
    @foreach ($faqs as $index => $faq)
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading{{ $index }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
          {{ $faq['question'] }}
        </button>
      </h2>
      <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          {{ $faq['answer'] }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
  

</div>
@endsection
    