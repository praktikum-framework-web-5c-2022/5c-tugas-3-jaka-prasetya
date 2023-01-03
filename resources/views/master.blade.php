<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> @yield('judul_halaman')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('logo-unsika.png')}}" alt="" style="height: 40px; width:40px;">
            Sistem Informasi Akademik Unsika
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link  @yield('active0')" aria-current="page" href="/">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  @yield('active1')" aria-current="page" href="/dosens/">Dosen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  @yield('active2')" aria-current="page" href="/mahasiswas/">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  @yield('active3')" aria-current="page" href="/mata_kuliahs/">Mata Kuliah</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h1>@yield('judul')</h1>
        @yield('intro')
        @yield('isi')
    </div>
</body>
</html>