@extends('layout')

@section('title', optional($package)->title)

@section('content')
<main class="container my-5">
    <div class="row align-items-start">
        <!-- Image Carousel -->
        <div class="col-md-7">
            <div id="packageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach($package->images as $index => $image)
                        <button type="button" data-bs-target="#packageCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner">
                    @foreach($package->images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $image->url }}" class="d-block w-100 rounded" alt="Package Image {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Package Details -->
        <div class="col-md-5 mt-3">
            <h3>{{ $package->title }}</h3>
            <div class=" card p-3" style="background-color: #FBF9F9; border-radius: 10px; min-height: 300px; overflow-y: auto;">
                <p>{{ $package->description }}</p>
            </div>
            <a href="https://wa.me/your_number?text=Consultation%20for%20{{ urlencode($package->title) }}" class="btn btn-success mt-3 mb-3 w-100">
                <i class="bi bi-whatsapp"></i> Konsultasi Langsung
            </a>
        </div>
        <div class="row mt-4 gx-5 gy-4">
            <!-- Form Inputs -->
            <div class="col-md-6 mb-3">
                <label for="luas" class="form-label">Luas</label>
                <input type="text" class="form-control text-end custom-border" id="luas" placeholder="m2">
            </div>
            <div class="col-md-6 mb-3">
                <label for="opsiPaket" class="form-label">Opsi Paket</label>
                <select class="form-select custom-border" id="opsiPaket">
                    <option>Paket 1</option>
                    <option>Paket 2</option>
                    <option>Paket 3</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="jumlahLantai" class="form-label">Jumlah Lantai</label>
                <input type="text" class="form-control custom-border" id="jumlahLantai">
            </div>
            <div class="col-md-6 mb-3 text-start">
                <p class="mb-1">Perkiraan Harga</p>
                <h3>Rp {{ $package->price }}</h3>
            </div>
        </div>
    </div>

    <!-- Consultation Form -->
    <div class="mt-5">
        <form class="border rounded shadow-sm overflow-hidden">
            <!-- Form Title as Part of the Form Background -->
            <div class="text-white p-3" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background-color: #275241;">
                <h4 class="mb-0">Form Konsultasi</h4>
            </div>
            
            <!-- Form Body -->
            <div class="p-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control custom-border" id="name" placeholder="Nama">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control custom-border" id="phone" placeholder="Nomor Telepon">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control custom-border" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-success d-flex align-items-center">
                        <i class="bi bi-whatsapp me-2"></i> Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection