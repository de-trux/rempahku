<?php
// referensikan file ".php"
include "function.php";
include "auth_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Rempah</title>
    
    <!-- All CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">REMPAHKU</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang Kami</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="destroy.php">Keluar</a>
              </li>      
            </ul>
          </div>
        </div>
      </nav>
      </div>
      <!-- section starts -->
      <section id="about" class="about high-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      <div class="about-img">
                          <img src="img/about.jpg" alt="" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <h2>Mengenai Kami</h2>
                            <p>Selamat datang di REMPAHKU, mitra terpercaya Anda dalam penyimpanan rempah-rempah dan sayuran! Kami adalah tim yang penuh semangat yang berdedikasi untuk merevolusi cara Anda melestarikan dan menikmati rasa dari anugerah alam ini.</p>
                            <p>Di REMPAHKU, kami memahami pentingnya kualitas dan kesegaran ketika datang ke rempah-rempah dan sayuran. Perjalanan kami dimulai dengan gagasan sederhana - untuk menciptakan solusi penyimpanan inovatif yang akan membantu Anda menjaga warna-warna cerah, aroma yang menggoda, dan cita rasa yang istimewa dari bahan makanan penting ini.</p>
                            <p>Terima kasih telah memilih REMPAHKU. Kami berharap dapat melayani Anda dan menjadi bagian dari kesukses</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <footer>
        <p>Made with &#128150; by <a id="detrux" href="https://github.com/de-trux" target="_blank">de-trux</a></p>
        <audio id="clickSound" src="_assets/ayylmao.mp3"></audio>
      </footer>
      <script src="js/script.js"></script>
</body>
</html>