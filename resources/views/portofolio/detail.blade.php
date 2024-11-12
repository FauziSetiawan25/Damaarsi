@extends('layout')

@section('title', 'Portfolio Details')

@section('content')
<div class="container mt-5 mb-5">
    <h4 class="underline-heading mb-4">Rumah {{ $portfolio->owner_name }}</h4>
    <div class="row mb-2">
        <div class="col-md-3 font-weight-bold">Gaya Rumah</div>
        <div class="col-md-6">: {{ $portfolio->style }}</div>
    </div>
    
    <div class="row mb-2">
        <div class="col-md-3 font-weight-bold">Luas Bangunan</div>
        <div class="col-md-6">: {{ $portfolio->area }} m<sup>2</sup></div>
    </div>
    
    <div class="row mb-2">
        <div class="col-md-3 font-weight-bold">Tanggal Selesai</div>
        <div class="col-md-6">: {{ $portfolio->completion_date->format('d/m/Y') }}</div>
    </div>
    
    <!-- Image Gallery -->
    <div class="row mt-5">
        @foreach ($portfolio->images as $image)
        <div class="col-md-6 mb-4">
            <img src="{{ $image->url }}" class="img-fluid w-100 rounded" alt="Portfolio Image">
        </div>
        @endforeach
    </div>
</div>
@endsection