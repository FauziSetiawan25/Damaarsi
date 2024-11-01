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
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
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
      <h3>Rekomendasi Desain</h3>
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
</div>
@endsection
    