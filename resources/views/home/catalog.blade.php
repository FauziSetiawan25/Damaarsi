@extends('layout')

@section('title', 'Catalog')

@section('content')
<main class="container my-5">
    <form class="d-flex search-bar ms-auto">
        <div class="input-group">
            <input class="form-control custom-border" type="search" placeholder="Search...">
            <button type="submit" class="btn btn-outline-secondary search-btn"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <section class="mt-5">
        <h2 class="underline-heading">Katalog Paket</h2>
        <div class="row mt-4">
            @foreach ($packages as $package)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset($package['image']) }}" class="card-img-top" alt="Package">
                        <div class="card-body">
                            <h5 class="card-title">{{ $package['title'] }}</h5>
                            <hr>
                            <a href="{{ route('package.detail', 1) }}" class="btn btn-outline-success">
                                Detail Paket<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-5">
        <h2 class="underline-heading">Katalog Desain</h2>
        <div class="row mt-4">
            @foreach ($designs as $design)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($design['image']) }}" class="card-img-top" alt="{{ $design['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $design['title'] }}</h5>
                            <p class="card-text">Harga mulai dari <br> Rp {{ number_format($design['price'], 0, ',', '.') }}</p>
                            <hr>
                            <a href="{{ route('design.detail', 1) }}" class="btn btn-outline-success">
                                Detail Desain<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
