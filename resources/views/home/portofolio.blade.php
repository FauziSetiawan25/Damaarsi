@extends('layout')

@section('title', 'Portofolio')

@section('content')
    <div class="portofolio-background">
        <div class="container pt-4 pb-5">
            <!-- Line Above -->
            <div class="line-horizontal"></div>

            <!-- Left-aligned Logo and Text with Lines -->
            <div class="d-flex align-items-center my-2">
                <img src="/images/logo3.png" alt="logo damaarsi" class="logo">
                <div class="ml-2 text-left">
                    <h6 class="mb-0 font-weight-bold">Portofolio</h6>
                    <h6 class="mb-0">Design</h6>
                </div>
            </div>

            <!-- Line Below -->
            <div class="line-horizontal mb-2"></div>

            <!-- Card Section -->
            <div class="row mt-4">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-6">
                        <div class="card mt-4 custom-card-portofoliopage">
                            <a href="{{ route('portofolio.detail', 1) }}">
                                <img src="{{ $portfolio['image'] }}" class="card-img-top" alt="{{ $portfolio['title'] }}">
                            </a>
                            <div class="hover-title text-left"><h5>{{ $portfolio['title'] }}</h5></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
