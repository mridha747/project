<!-- navigation bar -->
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/stmik">
      <img class="nav-link" src="<?= base_url('assets/'); ?>img/logo.svg" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="scroll nav-link" href="#cara-penggunaan">Cara Penggunaan</a>
        </li>
        <li class="nav-item">
          <a class="page-scroll nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="page-scroll nav-link" href="<?= base_url('tampilan/contact'); ?>">Contact </a>
        </li>
      </ul>
      <div class="buttonhover">
        <a href="<?= base_url('auth'); ?>" class="login btn my-2 my-sm-0"><span> Login</span> </a>

      </div>
      <div class="buttonhover ">

        <a href="<?= base_url('auth/registration'); ?>" class="sign btn my-2 my-sm-0">Sign Up free</a>
      </div>
    </div>
  </nav>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- penutup navbar -->


<!-- hero -->
<!-- Page Content -->
<div class="container">


  <!-- Heading Row -->
  <div class="hero row  align-items-center my-3">
    <div class=" col-lg-6 ">
      <p class="animated bounceInLeft text-hero">Sistem Aplikasi Pengumpulan
        Ujian Labortarium STMIK
        <br> Amik Riau
      </p>
      <p class="animated bounceInLeft textp">Sistem aplikasi ini ditujukan untuk mahasiswa <br>
        agar bisa melakukan pengumpulan <br>
        tugas lebih mudah.
      </p>
      <a class="animated bounceInLeft delay-0.5s btn-hero btn" href="<?= base_url('auth') ?>">Ayok Mulai</a>

    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-6">
      <img class="ilus animated bounceIn  img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/'); ?>img/ilushero.svg" alt="">
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->
</div>
<!-- penutup hero -->

<!-- cara penggunaan -->
<!-- Page Content -->

<div class="caraa">
  <div id="cara-penggunaan" class="cara container">

    <!-- Heading Row -->
    <div class="hero row align-items-center">
      <div class="ilus2 col-lg-6 ">
        <img class="ilustrasi img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/'); ?>img/ilus2.svg" alt="">


      </div>
      <!-- /.col-lg-8 -->
      <div class=" col-lg-6 ">
        <div class="syarat1">
          <p class="textpenggunaan">Cara Penggunaan dari <br>
            Sistem Aplikasi</p>
        </div>
        <div class="penggunaan">

          <div>
            <p><img src="<?= base_url('assets/'); ?>img/icon1.svg" alt="">Mulailah dari klik register</p>
          </div>
          <p><img src="<?= base_url('assets/'); ?>img/icon2.svg" alt="">Isi form register sesuai yang diminta</p>
          <p><img src="<?= base_url('assets/'); ?>img/icon3.svg" alt="">Aktivasi diemail anda</p>
          <p><img src="<?= base_url('assets/'); ?>img/icon4.svg" alt="">Login sesuai dengan email dan password</p>
          <p><img src="<?= base_url('assets/'); ?>img/icon5.svg" alt="">Isilah data biodata dan upload ujian </p>
        </div>
      </div>
    </div>
    <!-- /.col-md-4 -->
  </div>
</div>
<!-- /.row -->
<!-- penutup cara penggunaan -->






<!-- about -->

<div id="about" class="about">

  <p class="heading">Tentang Sistem Aplikasi</p>
  <p class="paragraf">Keuntungan yang didapatkan menggunakan sistem aplikasi ini </p>


  <div class="abouticon container">

    <!-- Heading Row -->
    <div class="aboutt">
      <div class="hero row align-items-center">
        <div class="syarat2 col-lg-4 col-md-4  ">
          <img class="ic mx-auto d-block img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/'); ?>img/mahasiswa.svg" alt="">
          <p class="headingabout">Mahasiswa</p>
          <p class="paragrafabout">Lebih mudah mengumpulkan ujian labortarium
            karena hanya meng-upload hasil
            ujian labortarium saja </p>

        </div>

        <div class="syarat3 col-lg-4 col-md-4  ">
          <img class="ic mx-auto d-block img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/'); ?>img/akses.svg" alt="">
          <p class="headingabout">Bebas Akses</p>
          <p class="paragrafabout">Sistem aplikasi berbasis web sehingga
            bisa diakses dimana saja selama
            masih terhubung oleh internet </p>

        </div>

        <div class="syarat4 col-lg-4 col-md-4  ">
          <img class="ic mx-auto d-block img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/'); ?>img/laboran.svg" alt="">
          <p class="headingabout">Tenaga Laboran</p>
          <p class="paragrafabout">Admin lebih mudah dalam memeriksa
            memotoring file file ujian mahasiswa
            yang berhasil terkirim ke server</p>

        </div>
        <!-- /.col-lg-8 -->

        <!-- /.col-md-4 -->
      </div>
    </div>

  </div>
</div>
<!-- penutup about -->


<hr class="hr">

<!-- footer -->
<div class="footer container">
  <img class="logo1 mx-auto d-block" src="<?= base_url('assets/'); ?>img/logo1.svg" alt="">
  <p class="headingfooter">Tenaga Laboran</p>
  <p class="paragraffooter">www.learn.stmikriau.ac.id </p>
  <p class="paragraffot">Jangan sungkan untuk bertanya kepada tenaga laboran diemail laboran@gmail.com </p>
  <div class="copyright">
    <p class="paragraff">Copyright © 2019-2021 STMIK Riau </p>
    <p class="paragraff2">All Rights Reservered. </p>

  </div>

</div>


<!-- penutup footer -->