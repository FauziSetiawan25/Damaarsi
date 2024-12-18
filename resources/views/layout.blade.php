<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Damaarsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                  <img src="/images/logo1.png" alt="Damaarsi brand" class="img-fluid" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('catalog') ? 'active' : '' }}" href="/catalog">Catalog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('portofolio') ? 'active' : '' }}" href="/portofolio">Portofolio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <section>
      
      @yield('content')

    </section>

    <!-- Footer -->
    <footer class="footer py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-9 d-flex align-items-center">
            <!-- Logo Damaarsi -->
            <div class="footer-logo me-3">
              <img src="/images/logo2.png" alt="Damaarsi Logo" class="img-fluid" width="80">
            </div>
            <!-- Teks Copywrite -->
            <div>
              <p class="mb-1">damaarsi</p>
              <p class="mb-0">&copy; All rights reserved. damaarsi 2024</p>
            </div>
          </div>
          <!-- Ikon Media Sosial -->
          <div class="col-md-3 text-center text-md-end">
            <div class="social-icons d-flex justify-content-center justify-content-md-end gap-3">
              <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
              <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
              <a href="#" class="text-white"><i class="bi bi-whatsapp"></i></a>
              <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="text-white"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>