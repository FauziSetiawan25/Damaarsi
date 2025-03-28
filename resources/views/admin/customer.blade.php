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
                        @foreach(App\Models\Customer::all() as $customer) <!-- Mengambil semua data customer -->
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
                    <a href="#" id="copyEmailsButton" class="btn" style="background-color: #0088FF; color: white;" data-toggle="modal">Salin Email Customer</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{-- JS untuk menyalin email customer --}}
<script>
    document.getElementById('copyEmailsButton').addEventListener('click', function() {
        const emails = [];
        const emailCells = document.querySelectorAll('#dataTable tbody tr td:nth-child(4)');

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
</script>

@endsection
