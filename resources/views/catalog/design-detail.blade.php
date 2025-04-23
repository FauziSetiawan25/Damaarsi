@extends('layout')

@section('title', optional($design)->title)

@section('content')
    <div class="detail-background">
        <main class="container py-5">
            <!-- Tombol Kembali dan Label Kategori -->
            <div class="d-flex align-items-center mb-3">
                <a href="/catalog" class="btn d-inline-flex align-items-center justify-content-center me-3"
                    style="background-color: #616161; color: white"><span class="material-symbols-outlined me-2">
                        undo
                    </span>Kembali</a>
                <span class="badge px-3 py-2"
                    style="background-color: #0A4833; font-size: 16px; font-weight:500">{{ $design->title }}</span>
            </div>

            <!-- Image Carousel -->
            <div class="rounded overflow-hidden mb-4">
                <div id="designCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($design->images as $index => $image)
                            <button type="button" data-bs-target="#designCarousel" data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        @foreach ($design->images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image->url }}" class="d-block w-100 rounded" style="height: 500px; object-fit: cover;
                                    alt="design Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- design Description -->
            <div class="desc mb-4">
                <div class="card p-3"
                    style="background-color: #FBF9F9; border-radius: 10px; min-height: 200px; overflow-y: auto;">
                    <h3>Deskripsi</h3>
                    <p>{{ $design->description }}</p>
                </div>
                <div class="row mt-4 gx-5 gy-4">
                    <div class="col-md-8 mb-3">
                        <h3>Konsultasi Desain Langsung Dengan Tim Kami!</h3>
                    </div>
                    <div class="col-md-3 mb-3 ms-auto">
                        <a href="https://wa.me/your_number?text=Consultation%20for%20{{ urlencode($design->title) }}"
                            class="btn btn-success mb-3 w-100">
                            <i class="bi bi-whatsapp"></i> Konsultasi Langsung
                        </a>
                    </div>
                </div>
            </div>



            <div class="card p-3">
                <h2>Buat Perkiraan Biaya Desain Rumah Impian Anda!</h2>
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
                        <h2>Rp {{ $design->price }}</h2>
                    </div>
                </div>

                <!-- Consultation Form -->
                <div class="mt-5">
                    <form class="border rounded shadow-sm overflow-hidden">
                        <!-- Form Title as Part of the Form Background -->
                        <div class="text-white p-3"
                            style="border-top-left-radius: 5px; border-top-right-radius: 5px; background-color: #275241;">
                            <h4 class="mb-0">Form Konsultasi</h4>
                        </div>

                        <!-- Form Body -->
                        <div class="p-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-border" id="name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-border" id="phone"
                                        placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control custom-border" id="email"
                                        placeholder="Email">
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
            </div>

        </main>
    </div>

@endsection
