<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Damaarsi</title>
    <link rel="shortcut icon" href="{{ asset('asset/img/icon.png') }}" >

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
{{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

{{-- @if($errors->any())
    <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif --}}

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="modal-content"> 
                    @if(session('success'))
                    <div class="modal-content" style="display: flex; align-items: center; justify-content: center; height: 70vh;">
                        <div style="background-color: #FFFFFF; padding: 30px; border-radius: 10px; width: 70%; text-align: center;">
                            <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="width: 300px; height: auto; margin-bottom: 70px;">
                            <h5 style="font-weight: bold; margin-bottom: 10px;">TERIMA KASIH TELAH MEMBERIKAN TESTIMONI TERBAIK ANDA UNTUK KAMI, PESAN KESAN ANDA SANGAT BERHARGA UNTUK KAMI!</h5>
                        </div>
                    </div>   
                    @else                 
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Berikan Testimoni Terbaik Anda!</h5>
                        <img src="{{ asset('asset/img/logo.png') }}" style="width: 140px; height: auto;">
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm" action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3" style="width: 50%;">
                                    <label for="productName">Nama</label>
                                    <input type="text" class="form-control" id="productName" name="nama" required>
                                </div>
                                <div class="flex-fill mr-3" style="width: 50%;">
                                    <label for="gambar">Unggah Gambar (Wajib)</label>
                                    <input type="file" name="gambar" class="form-control-file" accept=".jpg, .jpeg, .png, .gif" required>
                                    <small class="text-danger">*format .jpg, .jpeg, .png</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenisDesain">Pilih Jenis Desain</label>
                                <select name="id_produk" id="jenisDesain" class="form-control" required>
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group d-flex align-items-start">
                                <div class="flex-fill mr-3">
                                    <label for="productDescription">Testimoni</label>
                                    <textarea class="form-control" id="productDescription" name="testimoni" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LfqpXQqAAAAAFomvS0huko2uHMx26FtjsNlaAjn"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button class="btn" type="submit" id="saveProductBtn" style="background-color: #0088FF; color: white;">Tambah</button>
                            </div>
                        </form>                                                
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
