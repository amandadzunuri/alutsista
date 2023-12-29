<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <link rel="icon" href="../img/logo.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <title>About</title>
  </head>
  <body style="background-color: #FFFAE2;  font-family: 'Poppins'">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001524;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="padding: 12px;"><img src="../img/logo.png" alt="" width="50"
                    height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php" style="padding-right: 71px;">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="about.php" style="padding-right: 71px;">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../aset/aset.php" style="padding-right: 71px;">Aset</a>
                </li>
                <?php
                // Periksa apakah pengguna sudah login
                session_start();
                if(isset($_SESSION['username'])){
                  echo '
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./tambah/jenis_alutsista.html" style="padding-right: 71px;">Tambah Alutsista</a>
                  </li>';
                } else {
                  echo '
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../login/login.html" style="padding-right: 71px;">Login</a>
                  </li>';
                }
                ?>
              </ul>
              <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                      style="border-radius: 30px; background: none; border-color: #FFFAE2; color: #FFFAE2;">
              </form>
          </div>
        </div>
    </nav>
    <section>
        <img src="../img/background-about.svg" alt="" style="height: 25%; width: 100%; ">
        <div class="row row-cols-1 row-cols-md-3 g-4 p-4"  style="font-family: 'Poppins'">
            <div class="col pt-2">
              <div class="card h-100" style="border-radius: 15px;">
                <img src="../img/AD.svg" class="card-img-top" alt="...">
                <div class="card-body" style="background-color: #445D48;">
                  <h5 class="card-title fw-bold text-center" style="color: #FFFF;">Angkatan Darat</h5>
                </div>
              </div>
            </div>
            <div class="col pt-2">
              <div class="card h-100" style="border-radius: 15px;">
                <img src="../img/AL.svg" class="card-img-top" alt="...">
                <div class="card-body" style="background-color: #445D48;">
                  <h5 class="card-title fw-bold text-center" style="color: #FFFF;">Angkatan Laut</h5> 
                </div>
              </div>
            </div>
            <div class="col pt-2">
              <div class="card h-100" style="border-radius: 15px;">
                <img src="../img/AU.svg" class="card-img-top" alt="...">
                <div class="card-body" style="background-color: #445D48;">
                  <h5 class="card-title fw-bold text-center" style="color: #FFFF;">Angkatan Udara</h5>
                </div>
              </div>
            </div>
          </div>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>