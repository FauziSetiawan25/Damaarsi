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
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang2@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang3@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang4@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang5@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang6@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang7@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang8@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang9@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang10@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang11@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>10 Oktober 2024</td>
                                <td>Ujang</td>
                                <td>ujang12@gmail.com</td>
                                <td>Classic</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: right; margin-top: 20px;">
                        <a href="#" id="copyEmailsButton" class="btn" style="background-color: #0088FF; color: white;" data-toggle="modal" data-target="#addProductModal">Salin Email Kustomer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('copyEmailsButton').addEventListener('click', function() {
        // Ambil semua elemen email dari tabel
        const emails = [];
        const emailCells = document.querySelectorAll('#dataTable tbody tr td:nth-child(4)');

        emailCells.forEach(cell => {
            emails.push(cell.innerText); // Ambil teks dari setiap cell email
        });

        // Gabungkan email menjadi satu string dengan pemisah koma
        const emailString = emails.join(', ');

        // Salin ke clipboard
        navigator.clipboard.writeText(emailString).then(() => {
            alert('Email customer telah disalin');
        }).catch(err => {
            console.error('Error copying text: ', err);
        });
    });
</script>
@endsection