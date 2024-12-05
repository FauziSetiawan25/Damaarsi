@extends('layout')

@section('title', 'Portofolio')

@section('content')
<div class="container mt-5">
    <!-- Line Above -->
    <div class="line-horizontal"></div>
    
    <!-- Left-aligned Logo and Text with Lines -->
    <div class="d-flex align-items-center my-3">
        <img src="/images/logo3.png" alt="logo damaarsi" class="logo">
        <div class="ml-3 text-left">
            <h4 class="mb-0 font-weight-bold">Portofolio</h4>
            <h4 class="mb-0">Design</h4>
        </div>
    </div>
    
    <!-- Line Below -->
    <div class="line-horizontal mb-5"></div>
    
    <!-- Card Section -->
    <div class="row mt-4">
        @foreach ($portfolios as $portfolio)
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ $portfolio['image'] }}" class="card-img-top" alt="{{ $portfolio['title'] }}">
                <div class="card-body p-3">
                    <h5 class="card-text text-start mb-4">{{ $portfolio['title'] }}</h5>
                    <a href="{{ route('portofolio.detail', 1) }}" class="btn btn-outline-success">
                        Detail Portofolio<i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                    </a>
                </div>
            </div>           
        </div>
        @endforeach
    </div>
</div>
@endsection