

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Dashboard user</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">CV. Subur Komputer</h4>
          <p class="text-muted"> </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Menu</h4>
          <ul class="list-unstyled">
            <li><a href="{{ url('/produk/user') }}" class="text-white">Product</a></li>
            <li><a href="{{ url('/pos') }}" class="text-white"> Point of Sale</a></li>
            <li><a href="{{ url('/keluar') }}" class="text-white">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>About the company</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">CV. Subur Komputer</h1>
        <p class="lead text-muted">Merupakan perusahaan yang bergerak pada bidang penjualan perlatan komputer dan elektronik, berdiri sejak tahun 2010 dan telah dipercaya oleh masyrakat sebagai perusahaan pendistribusi perlatan komputer dengan kualitas terbaik dikelasnya. dibawah ini merupakan beberapa contoh perlatan komputer yang kami jual diantaranya</p>
        <p>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/CPU1.jpg">
            <div class="card-body">
              <p class="card-text">CPU ini memiliki spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 1804693455</p>
           <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/dvd1.jpg">

            <div class="card-body">
              <p class="card-text">DVD ini memiliki  kualitas baik dengan penyimpanan yang cukup besar. Barang ini memiliki kode sebagai berikut 1135945574 </p>
           <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="gambar/hardisk.jpg">

            <div class="card-body">
              <p class="card-text">Hardisk dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 422636698</p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/modem.jpg">

            <div class="card-body">
              <p class="card-text">Modem dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 1723681420</p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="gambar/printer.jpg">

            <div class="card-body">
              <p class="card-text">Printer dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 1723681420 </p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/tinta1.jpg">
            <div class="card-body">
              <p class="card-text">Tinta Printer dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 447826102</p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>  
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/tv.jpg">

            <div class="card-body">
              <p class="card-text">Televisi dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 655798807</p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="gambar/keyboard.jpg">

            <div class="card-body">
              <p class="card-text">Keyboard dengan spesifikasi dan kualitas terbaik dikelasnya. Barang ini memiliki kode sebagai berikut 714841997</p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="gambar/cpu2.jpg">

            <div class="card-body">
              <p class="card-text">CPU dengan spesifikasi dan kualitas terbaik untuk dikelasnya. Barang ini memiliki kode sebagai berikut 836500466 </p>
              <div class="btn-group">
                   <a href="{{ url('pos')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i>Beli Sekarang</a>
            </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    
    
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>

