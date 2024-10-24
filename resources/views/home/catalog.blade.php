@extends('layout')

@section('title', 'Catalog')

@section('content')
<main class="container my-5">
    <form class="d-flex search-bar ms-auto">
        <input class="form-control me-2" type="search" placeholder="Search...">
        <button type="submit" class="btn search-btn"><i class="fas fa-search"></i></button>
    </form>
    <section>
        <h2>Katalog Paket</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="house.jpg" class="card-img-top" alt="Package">
                    <div class="card-body">
                        <p class="card-text">Penjelasan Paket</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <h2>Katalog Desain</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="house.jpg" class="card-img-top" alt="Desain 1">
                    <div class="card-body">
                        <h5 class="card-title">Desain 1</h5>
                        <p class="card-text">Harga mulai dari <br> Rp 999999999</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="house.jpg" class="card-img-top" alt="Desain 1">
                    <div class="card-body">
                        <h5 class="card-title">Desain 1</h5>
                        <p class="card-text">Harga mulai dari <br> Rp 999999999</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="house.jpg" class="card-img-top" alt="Desain 1">
                    <div class="card-body">
                        <h5 class="card-title">Desain 1</h5>
                        <p class="card-text">Harga mulai dari <br> Rp 999999999</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="house.jpg" class="card-img-top" alt="Desain 1">
                    <div class="card-body">
                        <h5 class="card-title">Desain 1</h5>
                        <p class="card-text">Harga mulai dari <br> Rp 999999999</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection