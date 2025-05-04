@extends('admin.layout.navbar')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pengunjung</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalPengunjung">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Pelanggan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalCustomer">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Produk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalProduk">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Visitor Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="visitorChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/visitor/stats') // Panggil API untuk mengambil data pengunjung
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('visitorChart').getContext('2d');

                var visitorChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates, // Data tanggal dari API
                        datasets: [{
                            label: 'Jumlah Pengunjung',
                            data: data.counts, // Data jumlah pengunjung dari API
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, 
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching visitor stats:', error));
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/visitor/count') // Pastikan ini adalah endpoint yang benar
            .then(response => response.json())
            .then(data => {
                if (data.total_pengunjung !== undefined) {
                    document.getElementById('totalPengunjung').innerText = data.total_pengunjung;
                } else {
                    document.getElementById('totalPengunjung').innerText = "0"; // Jika tidak ada produk
                }
            })
            .catch(error => {
                console.error('Error fetching total pengunjung:', error);
                document.getElementById('totalPengunjung').innerText = "Error";
            });
    });

    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/customer/count') // Pastikan ini adalah endpoint yang benar
            .then(response => response.json())
            .then(data => {
                if (data.total_customer !== undefined) {
                    document.getElementById('totalCustomer').innerText = data.total_customer;
                } else {
                    document.getElementById('totalCustomer').innerText = "0"; // Jika tidak ada produk
                }
            })
            .catch(error => {
                console.error('Error fetching total pengunjung:', error);
                document.getElementById('totalCustomer').innerText = "Error";
            });
    });

    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/produk/count') // Pastikan ini adalah endpoint yang benar
            .then(response => response.json())
            .then(data => {
                if (data.total_produk !== undefined) {
                    document.getElementById('totalProduk').innerText = data.total_produk;
                } else {
                    document.getElementById('totalProduk').innerText = "0"; // Jika tidak ada produk
                }
            })
            .catch(error => {
                console.error('Error fetching total produk:', error);
                document.getElementById('totalProduk').innerText = "Error";
            });
    });
</script>

</body>
</html>
@endsection