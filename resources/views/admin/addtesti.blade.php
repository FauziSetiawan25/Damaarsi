<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        body {
            background-color: #4D6A58;
        }
        .modal-content {
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Tambah Testimoni</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm" action="#" method="POST">
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="width: 50%;">
                                    <label for="productName">Nama</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="flex-fill mr-3" style="width: 50%;">
                                    <label for="gambar">Unggah Gambar 1 (Wajib)</label>
                                    <input required="required" type="file" name="gambar" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; width: 100%; box-sizing: border-box;">
                                    <small class="text-danger">*format .jpg, .jpeg, .png, .gif</small>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productPrice">Jenis Desain</label>
                                    <input type="number" class="form-control" id="productPrice" required>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="max-width: 50%;">
                                    <label for="productDescription">Testimoni</label>
                                    <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LfqpXQqAAAAAFomvS0huko2uHMx26FtjsNlaAjn"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" type="button" id="saveProductBtn" style="background-color: #0088FF; color: white;">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Optional: Handle form submission here
        document.getElementById('saveProductBtn').addEventListener('click', function() {
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert('Please complete the reCAPTCHA');
                return;
            }
            document.getElementById('addProductForm').submit();
        });
    </script>
</body>

</html>
