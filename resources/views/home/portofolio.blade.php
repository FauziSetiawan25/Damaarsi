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
    <div class="line-horizontal mb-4"></div>
    
    <!-- Card Section -->
    <div class="row">
        @for ($i = 0; $i < 4; $i++)
        <div class="col-md-6">
            <a href="#">
                <div class="card mb-4">
                    <img src="/images/sample.png" class="card-img-top" alt="Rumah Pak Fulan">
                    <div class="card-body p-2">
                        <p class="card-text text-center mb-0">Rumah Pak Fulan</p>
                    </div>
                </div>
            </a>
            
        </div>
        @endfor
    </div>
</div>
@endsection
