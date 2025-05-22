@extends('layout')

@section('title', 'Contact')

@section('content')
    <div class="contact-background">
        <div class="container-fluid p-0">
            <!-- Bagian Header Contact -->
            <div class="contact-header text-center mb-5">
                <h1 class="fw-bold">Contact</h1>
            </div>

            <!-- Bagian Contact Info (Dua Kolom) -->
            <div class="container">
                <div class="card shadow-sm mb-5 custom-card w-100">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center border-end">
                            <!-- Kolom Kiri -->
                            <div class="p-4 text-center">
                                <h2 class="fw">Contact</h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-6"> <!-- Kolom Kanan -->
                            <div class="p-5">
                                <h4>Address</h4>
                                <p id="contactAddress"></p>

                                <h4>Let's Talk</h4>
                                <p id="contactPhone"></p>

                                <h4>Support</h4>
                                <p id="contactEmail"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bagian Map -->
            <div class="row gx-0 justify-content-center">
                <div class="col-12">
                    <div class=" shadow-sm">
                        <div id="contactMaps"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/pengaturan')
        .then(response => response.json())
        .then(data => {
            const contactInfo = data.pengaturan;
            // Mencari dan menampilkan informasi kontak
            contactInfo.forEach(info => {
                if (info.keterangan === "Alamat") {
                    document.getElementById('contactAddress').innerText = info.value;
                } else if (info.keterangan === "Whatsapp") {
                    document.getElementById('contactPhone').innerText = info.value;
                } else if (info.keterangan === "Email") {
                    document.getElementById('contactEmail').innerText = info.value;
                } else if (info.keterangan === "Maps") {
                    document.getElementById('contactMaps').innerHTML = info.value;
                }
            });
        })
        .catch(error => console.error('Gagal memuat informasi kontak:', error));
});
</script>
@endsection
