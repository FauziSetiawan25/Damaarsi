<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Damaarsi</title>
    <link rel="shortcut icon" href="{{ asset('asset/img/icon.png') }}" >

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<body style="background-color: #4D6A58">
    <div class="row justify-content-center mt-5">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="mt-3" src="{{ asset('asset/img/logo.png') }}" style="width: 140px; height: auto;">
                    </div>
                    <div class="text-center fs-3 mt-3" style="font-weight: bold; color: black; font-size: 20px;">Login</div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    <div class="invalid-feedback" id="usernameError"></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <div class="invalid-feedback" id="passwordError"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck" style="color: black">Remember me</label>
                                </div>
                            </div>
                            <div class="mb-3 row mt-1">
                                <div class="col-md-12">
                                    <button type="submit" class="form-control btn rounded-10" style="border-radius: 20px; background-color:#4D6A58; color: white;">Masuk</button>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = {
                username: document.getElementById('username').value,
                password: document.getElementById('password').value
            };

            fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) throw response;
                return response.json();
            })
            .then(data => {
                // Simpan token ke localStorage
                localStorage.setItem('admin_token', data.token);
                window.location.href = "{{ route('admin.dashboard') }}";
            })
            .catch(async error => {
                if (error.status === 401) {
                    const err = await error.json();
                    alert(err.message);
                } else if (error.status === 422) {
                    const err = await error.json();
                    if (err.errors) {
                        alert(Object.values(err.errors).join('\n'));
                    }
                } else if (error.status === 403) {
                    const err = await error.json();
                    alert(err.message || 'Akses ditolak.');
                } else {
                    const err = await error.text();
                    console.error('Error detail:', err);
                    alert('Terjadi kesalahan pada server.');
                }
            });
        });
    });
</script>
</body>
</html>