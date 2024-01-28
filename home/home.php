<?php
include("../php/config.php");

$qkalutsista = "SELECT * FROM tb_kendaraan ORDER BY tanggal_pembelian DESC LIMIT 3";
$data_kalutsista = $conn->query($qkalutsista);

$qsalutsista = "SELECT * FROM tb_senjata ORDER BY tanggal_pembelian DESC LIMIT 3";
$data_salutsista = $conn->query($qsalutsista);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    .center-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .center-content {
      text-align: center;
    }
  </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <link rel="icon" href="../img/logo.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    
    <title>Alutsista</title>
  </head>
  <body style="background-color: #FFFAE2; font-family: 'Poppins';">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001524;">
      <div class="container-fluid">
          <a class="navbar-brand" href="home.php" style="padding: 12px;"><img src="../img/Ellipse 2.svg" alt="" width="50"
                  height="50"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php" style="padding-right: 71px;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../about/about.php" style="padding-right: 71px;">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../aset/aset.php" style="padding-right: 71px;">Aset</a>
              </li>
        
              <?php
                // Periksa apakah pengguna sudah login
                session_start();
                if(isset($_SESSION['username'])) {
                  if($_SESSION['role'] == "admin") {
                    echo '<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../tambah/jenis_alutsista.html" style="padding-right: 71px;">Tambah Alutsista</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login/logout.php" style="padding-right: 71px;">Logout</a>
                          </li>';
                } elseif($_SESSION['role'] == "user") {
                  echo '<li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="../login/logout.php" style="padding-right: 71px;">Logout</a>
                        </li>';
                }
                } else {
                    echo '<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../login/login.html" style="padding-right: 71px;">Login</a>
                          </li>';
                
                }
              ?>
            </ul>
        </div>
      </div>
  </nav>
   
  <body >
    <section>
    <div class="center-container">
    <div class="center-content">
      <img src="../img/Group 78.svg" class=" p-4 w-100" alt="..." >
    </div>
  </div>
    <p class="fw-bold fs-3 ps-4 ms-4 mt-2">Alutsista Terbaru</p>
      <div class="row ps-4 ms-4 pe-4 me-4">
      <?php
        foreach($data_kalutsista as $index => $value){
      ?>
      <div class="col">
        <a href="../detail/detail_kendaraan.php?kode=<?php echo $value['kode']; ?>" class="text-decoration-none text-dark">
          <img src="<?php echo $value['gambar']; ?>" class="card-img-top w-100" alt="..." style="height: 13.9375rem; border-radius: 0.9375rem;">
          <div class="mt-4">
            <h5 class="card-text fw-bold"><?php echo $value['nama']; ?></h5>
            <p class="card-text"><?php echo $value['model']; ?></p>
          </div>
        </a>
      </div>
      <?php
      }
      ?>
      </div>

      <div class="row ps-4 pe-4 mt-4 ps-4 ms-4 me-4">
      <?php
        foreach($data_salutsista as $index => $value){
      ?>
      <div class="col">
        <a href="../detail/detail_senjata.php?kode=<?php echo $value['kode']; ?>" class="text-decoration-none text-dark">
          <img src="<?php echo $value['gambar']; ?>" class="card-img-top w-100" alt="..." style="height: 13.9375rem; border-radius: 0.9375rem;">
          <div class="mt-4">
            <h5 class="card-text fw-bold"><?php echo $value['nama']; ?></h5>
            <p class="card-text"><?php echo $value['model']; ?></p>
          </div>
        </a>
      </div>
      <?php
      }
      ?>
      </div>


    <section>
      <p class="fw-bold fs-3 ps-4 mt-4 ms-4 me-4">Tentang Alutsista Kami</p>
      <div class="row ps-4 pe-4 ms-4 me4">
        <div class="col">
          <div class="card h-100">
            <img src="../img/Group 40.svg" class="card-img-top" alt="...">
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../img/Group 41.svg" class="card-img-top" alt="..."> 
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../img/Group 42.svg" class="card-img-top" alt="...">
          </div>
        </div>
      </div>

    </section>
    <div class="container">
      <div class="row pt-5"></div>
      <div class="row pt-5">
        <div class="row pt-5"></div>
        <div class="row pt-5"></div>
        <div class="fw-bold col order-first fs-3">
          +10 Kapal Perang
        </div>
        <div class="fw-bold col order-first fs-3">
          +50 Kendaraan Berat
        </div>
        <div class="fw-bold col order-first fs-3">
          +50 Kapal Selam
        </div>
        <div class="fw-bold col order-first fs-3">
          +50 Pesawat Tempur
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>