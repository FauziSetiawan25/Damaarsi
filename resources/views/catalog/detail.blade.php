@extends('layout')

@section('title', optional($design)->title)

@section('content')
    <div class="detail-background">
        <main class="container py-5">
            <!-- Tombol Kembali dan Label Kategori -->
            <div class="d-flex align-items-center mb-3">
                <a href="{{ url()->previous() }}" class="btn d-inline-flex align-items-center justify-content-center me-3"
                    style="background-color: #616161; color: white"><span class="material-symbols-outlined me-2">
                        undo
                    </span>Kembali</a>
                {{-- <span class="badge px-3 py-2"
                    style="background-color: #0A4833; font-size: 16px; font-weight:500">{{ $design->title }}</span> --}}
                <span class="badge px-3 py-2" style="background-color: #0A4833; font-size: 16px; font-weight:500"
                    id="productName"></span>
            </div>

            <!-- Image Carousel -->
            <div class="rounded overflow-hidden mb-4">
                <div id="designCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    {{-- <!-- Indicators -->
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
                    </div> --}}
                    <!-- Indicators -->
                    <div class="carousel-indicators" id="carouselIndicators"></div>
                    <!-- Carousel Items -->
                    <div class="carousel-inner" id="carouselItems"></div>
                </div>
            </div>

            <!-- design Description -->
            <div class="desc mb-1">
                <div class="card p-3"
                    style="background-color: #FBF9F9; border-radius: 10px; min-height: 200px; overflow-y: auto;">
                    <h3>Deskripsi</h3>
                    <p id="productDescription"></p>
                </div>
                <div class="row mt-4 gx-5 gy-4">
                    <div class="col-md-8">
                        <h3>Konsultasi Desain Langsung Dengan Tim Kami!</h3>
                    </div>
                    {{-- <div class="col-md-3 mb-3 ms-auto">
                        <a href="https://wa.me/your_number?text=Consultation%20for%20{{ urlencode($design->title) }}"
                            class="btn btn-success mb-3 w-100">
                            <i class="bi bi-whatsapp"></i> Konsultasi Langsung
                        </a>
                    </div> --}}
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
                        <h2 id="productPrice"></h2>

                    </div>
                </div>

                <!-- Consultation Form -->
                <div class="mt-5">
                    <form id="consultationForm" class="border rounded shadow-sm overflow-hidden">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil ID produk dari URL, misal URL: /catalog/design/1
            const pathSegments = window.location.pathname.split('/');
            const productId = pathSegments[pathSegments.length - 1];

            fetch(`/api/produk/${productId}`)
                .then(response => response.json())
                .then(data => {
                    const produk = data.data;

                    // Tampilkan nama produk
                    document.getElementById('productName').innerText = produk.nama_produk;

                    // Tampilkan deskripsi produk
                    document.getElementById('productDescription').innerText = produk.deskripsi;

                    // Tampilkan harga produk
                    document.getElementById('productPrice').innerText =
                        `Rp ${Number(produk.harga).toLocaleString('id-ID')}`;


                    // Tampilkan gambar produk dalam carousel
                    const indicatorsContainer = document.getElementById('carouselIndicators');
                    const carouselInner = document.getElementById('carouselItems');

                    indicatorsContainer.innerHTML = '';
                    carouselInner.innerHTML = '';

                    produk.gambar_produk.forEach((image, index) => {
                        // Buat tombol indikator carousel
                        const indicator = document.createElement('button');
                        indicator.type = 'button';
                        indicator.setAttribute('data-bs-target', '#productCarousel');
                        indicator.setAttribute('data-bs-slide-to', index);
                        indicator.setAttribute('aria-label', `Slide ${index + 1}`);
                        if (index === 0) {
                            indicator.classList.add('active');
                            indicator.setAttribute('aria-current', 'true');
                        }
                        indicatorsContainer.appendChild(indicator);

                        // Buat elemen carousel item
                        const carouselItem = document.createElement('div');
                        carouselItem.className = 'carousel-item' + (index === 0 ? ' active' : '');
                        carouselItem.innerHTML = `
                            <img src="/storage/produk/${image.gambar}" class="d-block w-100 rounded" style="height: 500px; object-fit: cover;" alt="Product Image ${index + 1}">
                        `;
                        carouselInner.appendChild(carouselItem);
                    });
                })
                .catch(error => {
                    console.error('Gagal memuat detail produk:', error);
                });
        });
    </script>
    <script>
        document.getElementById('consultationForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const pathSegments = window.location.pathname.split('/');
    const productId = pathSegments[pathSegments.length - 1]; // Ambil id dari URL

    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();

    if (!name || !phone || !email) {
        alert('Mohon isi semua field terlebih dahulu.');
        return;
    }

    const formData = new FormData();
    formData.append('produk', productId); // Tambahkan ID produk dari URL
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('email', email);

    try {
        const response = await fetch('/api/customer/add', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        });

        const result = await response.json();
        console.log(result); 

        if (result.message && result.message.toLowerCase().includes("berhasil")) {
            const pengaturanRes = await fetch('/api/pengaturan');
            const pengaturanJson = await pengaturanRes.json();

            const waSetting = pengaturanJson.pengaturan.find(item => item.keterangan.toLowerCase() === 'whatsapp');

            if (!waSetting || !waSetting.value) {
                alert('Nomor WhatsApp tujuan tidak ditemukan.');
                return;
            }

            let waNumber = waSetting.value.trim();
            if (waNumber.startsWith('0')) {
                waNumber = '62' + waNumber.substring(1);
            }
            waNumber = waNumber.replace(/[^0-9]/g, '');

            const message = `Halo, saya ingin konsultasi:\n\nNama: ${name}\nNomor Telepon: ${phone}\nEmail: ${email}`;
            const encodedMessage = encodeURIComponent(message);
            const waUrl = `https://wa.me/${waNumber}?text=${encodedMessage}`;

            window.open(waUrl, '_blank');
            document.getElementById('consultationForm').reset();
        } else {
            alert('Gagal menyimpan data. Silakan coba lagi.');
        }
    } catch (error) {
        console.error(error);
        alert('Terjadi kesalahan pada server atau API.');
    }
});


    </script>

@endsection
