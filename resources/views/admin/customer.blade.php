@extends('admin.layout.navbar')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-white">Daftar Customer</h1>
        </div>
        <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">Tabel Customer</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mengisi</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Jenis Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Customer::all() as $customer)
                                <!-- Mengambil semua data customer -->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->created_at->format('d F Y') }}</td> <!-- Format tanggal -->
                                    <td>{{ $customer->nama }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->no_telp }}</td>
                                    <td>{{ $customer->produk->nama_produk ?? 'Produk Tidak Ditemukan' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="text-align: right; margin-top: 20px;">
                        <button id="copyEmailsButton" class="btn" style="background-color: #0088FF; color: white;">
                            Get Email
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="successCopyEmail" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 25px;">
                <div class="modal-header"
                    style="background-color: #4D6957; color: white; border-top-left-radius: 25px; border-top-right-radius: 25px;">
                    <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        style="color: white; opacity: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/845/845646.png" width="50" alt="Success">
                    <p class="mt-3">Get Email Berhasil</p>
                </div>
            </div>
        </div>
    </div>

    {{-- JS untuk menyalin email customer --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyButton = document.getElementById('copyEmailsButton');

        copyButton.addEventListener('click', function (e) {
            e.preventDefault();

            fetch('/api/customer')
                .then(response => response.json())
                .then(data => {
                    // Ambil hanya field email
                    const emails = data.map(item => item.email).join(', ');

                    // Salin ke clipboard
                    navigator.clipboard.writeText(emails)
                        .then(() => {
                            alert('Emails copied to clipboard!');
                        })
                        .catch(err => {
                            console.error('Clipboard error:', err);
                            alert('Failed to copy emails.');
                        });
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Failed to fetch emails.');
                });
        });
    });
    </script>


{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        axios.get('/api/customers') // Mengambil data dari API
            .then(function (response) {
                const customers = response.data;
                const customerTableBody = document.getElementById('customerTableBody');

                customers.forEach((customer, index) => {
                    const tr = document.createElement('tr');
                    
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${new Date(customer.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                        <td>${customer.nama}</td>
                        <td>${customer.email}</td>
                        <td>${customer.no_telp}</td>
                        <td>${customer.produk?.nama_produk ?? 'Produk Tidak Ditemukan'}</td>
                    `;
                    
                    customerTableBody.appendChild(tr);
                });
            })
            .catch(function (error) {
                console.log('Error fetching customer data:', error);
            });

        document.getElementById('copyEmailsButton').addEventListener('click', function() {
            const emails = [];
            const emailCells = document.querySelectorAll('#customerTableBody tr td:nth-child(4)');

            emailCells.forEach(cell => {
                emails.push(cell.innerText); 
            });

            const uniqueEmails = [...new Set(emails)];
            const emailString = uniqueEmails.join(', ');

            navigator.clipboard.writeText(emailString).then(() => {
                alert('Email customer telah disalin');
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        });
    });
</script> --}}
@endsection
