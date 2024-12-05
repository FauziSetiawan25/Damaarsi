@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="container-fluid">
    <!-- Bagian Header Contact -->
    <div class="contact-header text-center mb-5">
        <h1 class="fw-bold">Contact</h1>
    </div>

    <!-- Bagian Contact Info (Dua Kolom) -->
    <div class="card shadow-sm mb-5 custom-card">
        <div class="row g-0">
            <div class="col-md-6 d-flex align-items-center justify-content-center border-end"> <!-- Kolom Kiri -->
                <div class="p-4 text-center">
                    <h2 class="fw">Contact</h2>
                </div>
            </div>
            <div class="col-md-6"> <!-- Kolom Kanan -->
                <div class="p-4">
                    <h3>Address</h3>
                    <p>{{ $contactInfo['address'] }}</p>

                    <h3>Let's Talk</h3>
                    <p>{{ $contactInfo['phone'] }}</p>

                    <h3>Support</h3>
                    <p>{{ $contactInfo['email'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Map -->
    <div class="row gx-0 justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15814.911479032511!2d109.97933791054759!3d-7.712321740641388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aebca9d942d21%3A0x417e3f7f83b87702!2sJl.%20Mr.%20Wilopo%2C%20Doplang%2C%20Kec.%20Purworejo%2C%20Kabupaten%20Purworejo%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1729772903512!5m2!1sid!2sid" 
                width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection