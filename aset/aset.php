<?php
include("../php/config.php");

// Initialize variables for search
$search_query = "";
$where_condition = "";

// Check if a search query is submitted
if(isset($_GET['search'])){
    $search_query = $_GET['search'];
    $where_condition = " WHERE nama LIKE '%$search_query%' OR model LIKE '%$search_query%'";
}

// Query for Kendaraan
$qkendaraan = "SELECT * FROM tb_kendaraan" . $where_condition;
$data_kendaraan = $conn->query($qkendaraan);

// Query for Senjata
$qsenjata = "SELECT * FROM tb_senjata" . $where_condition;
$data_senjata = $conn->query($qsenjata);
?>

<!DOCTYPE html>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-GLhlTQ8iK7ZLlqZlTz1z2u+M5O7ScNnhN+6d1/hWSl5UZ5P+iS/1G2n2O6dI1Aq" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <title>Aset</title>
</head>

<body style="background-color: #FFFAE2; font-family: 'Poppins';" >
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001524;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home/home.php" style="padding: 12px;"><img src="../img/logo.png" alt="" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../home/home.php" style="padding-right: 71px;">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../about/about.php" style="padding-right: 71px;">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="aset.php" style="padding-right: 71px;">Aset</a>
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
                            <a class="nav-link active" aria-current="page" href="../index.php" style="padding-right: 71px;">Login</a>
                          </li>';
                
                }
              ?>
              </ul>
          </div>
        </div>
    </nav>

    <!-- Search box -->
    <div class="container mt-4">
        <form action="aset.php" method="get">
            <div class="input-group mb-3 w-100">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="<?php echo $search_query; ?>">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    
    <h4 class="fw-bold mt-4 ms-4">Data Kendaraan</h4>
    <div class="row row-cols-1 row-cols-md-4  ms-2">
    <?php
        foreach($data_kendaraan as $index => $value){
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
    
    <h4 class="fw-bold mt-4 ms-4">Data Senjata</h4>
    <div class="row row-cols-1 row-cols-md-4 ms-2">
    <?php
        foreach($data_senjata as $index => $value){
    ?>
        <div class="col mt-4"> 
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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>
