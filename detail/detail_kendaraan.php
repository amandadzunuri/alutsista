<?php
include("../php/config.php");

// Check if the 'kode' parameter is set in the URL
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Fetch the details from the database based on the kode
    $query = "SELECT * FROM tb_kendaraan WHERE kode = '$kode'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $detail = $result->fetch_assoc();

        // Display the details on the page
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

    <title>Detail Alutsista</title>
</head>
<body style="background-color: #FFFAE2;">

    <div class="" style="padding: 3%;">
        <div class="row ">
            <div class="col-6">
              <div class="container text-center "></div>
              <img src="<?php echo $detail['gambar']; ?>" class="img-fluid" alt="detail Alutsista" style="width: 44.75rem; height: 25rem; border-radius: 0.9375rem;">
            </div>

            <div class="col-6"  style="text-align: left; font-family: 'Poppins';">
            <h3 style="font-weight: bold;"><?php echo $detail['nama']; ?></h3>
              <p style="margin-top: 1rem;"><?php echo $detail['kode']; ?></p>
              <p style="margin-top: 1rem;"><?php echo $detail['model']; ?></p>

              <?php
                  // Periksa apakah pengguna sudah login
                  session_start();
                  
                  if(isset($_SESSION['username'])) {
                    if($_SESSION['role'] == "admin") {
                      echo '<div class="d-grid gap-4 d-md-block">
                              <a href="../edit/edit_kendaraan.php?kode=' . $detail['kode'] . '" class="btn btn-primary" style="border-radius: 0.3125rem; background: #1F9B00; width: 12.5rem;">Edit Data</a>
                              <a href="../hapus/hapus_kendaraan.php?kode=' . $detail['kode'] . '" class="btn btn-primary" style="border-radius: 0.3125rem; background: #EF0000; width: 12.5rem;">Hapus Data</a>
                            </div>';
                  } elseif($_SESSION['role'] == "user") {
                    echo '';
                  }
                }
              ?>
              
            </div>
          </div>
  
          <div class="row">
            <div class="col-6 mt-4" style="font-family: 'Poppins'">
                <h4 style="text-align: left; font-weight: bold;">Detail Aset</h4>
                  <div class="row mt-4" style="text-align: left; line-height: 1rem;">
                    <div class="col-6 col-sm-4">
                      <p>Jenis Kendaraan</p>
                      <p>Berat Tempur</p>
                      <p>Ukuran Kendaraan</p>
                      <p>Kapasitas Awak</p>
                      <p>Persenjataan Utama</p>
                      <p>Kecepatan Maksimal</p>
                      <p>Sistem Navigasi</p>
                    </div>
                    <div class="col-6 ">
                    <p>: <?php echo $detail['jenis']; ?></p>
                    <p>: <?php echo $detail['berat']; ?></p>
                    <p>: <?php echo $detail['ukuran']; ?></p>
                    <p>: <?php echo $detail['awak']; ?></p>
                    <p>: <?php echo $detail['senjata_utama']; ?></p>
                    <p>: <?php echo $detail['kecepatan']; ?></p>
                    <p>: <?php echo $detail['sistem_navigasi']; ?></p>
                    </div>
                  </div>
            </div>
            <div class="col-6 mt-4" style="font-family: 'Poppins'">
                <h4 style="text-align: left; font-weight: bold;">Riwayat Aset</h4>
                  <div class="row mt-4" style="text-align: left; line-height: 1rem;">
                    <div class="col-6 col-sm-4">
                      <p>Tanggal Pembelian</p>
                      <p>Lokasi Saat Ini</p>
                      <p>Status Aset</p>
                      <p>Tanggal Perbaikan</p>
                      <p>Jenis Perawatan</p>
                    </div>
                    <div class="col-6 ">
                      <p>: <?php echo $detail['tanggal_pembelian']; ?></p>
                      <p>: <?php echo $detail['lokasi']; ?></p>
                      <p>: <?php echo $detail['status']; ?></p>
                      <p>: <?php echo $detail['tanggal_perbaikan']; ?></p>
                      <p>: <?php echo $detail['jenis']; ?></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
      
        
   
</body>
</html>

<?php
    } else {
        echo "Item not found";
    }
} else {
    echo "Invalid request";
}
?>