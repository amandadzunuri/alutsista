<?php
include("../php/config.php");

// Check if the 'kode' parameter is set in the URL
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Fetch the details from the database based on the kode
    $query = "SELECT * FROM senjata WHERE kode = '$kode'";
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
   

              <div class="d-grid gap-4 d-md-block">
                <a href="../edit/edit_senjata.php?kode=<?php echo $detail['kode']; ?>" class="btn btn-primary" style="border-radius: 0.3125rem; background: #1F9B00; width: 12.5rem;">Edit Data</a>
                <a href="../hapus/hapus_senjata.php?kode=<?php echo $detail['kode']; ?>" class="btn btn-primary" style="border-radius: 0.3125rem; background: #EF0000; width: 12.5rem;">Hapus Data</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="row">
            <div class="col-6 mt-4" style="font-family: 'Poppins'">
                <h4 style="text-align: left; font-weight: bold;">Detail Aset</h4>
                  <div class="row mt-4" style="text-align: left; line-height: 1rem;">
                  <div class="col-6 col-sm-4">
                      <p>Jenis Senjata</p>
                      <p>Ukuran Kaliber</p>
                      <p>Kapasitas Megazen</p>
                      <p>Panjang Laras</p>
                      <p>Bahan Konstruksi</p>
                      <p>Bobot Pistol</p>
                      <p>Kecepatan Peluru</p>
                    </div>
                    <div class="col-6 col-sm-4">
                      <p>: <?php echo $detail['jenis']; ?></p>
                      <p>: <?php echo $detail['kaliber']; ?></p>
                      <p>: <?php echo $detail['kapasitas']; ?></p>
                      <p>: <?php echo $detail['panjang']; ?></p>
                      <p>: <?php echo $detail['bahan']; ?></p>
                      <p>: <?php echo $detail['bobot']; ?></p>
                      <p>: <?php echo $detail['kecepatan']; ?></p>
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
                      <p>: <?php echo $detail['jenis_perbaikan']; ?></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>


    <!-- ... Your HTML code ... -->

    <!-- Bootstrap JS (Popper.js and jQuery included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-Jn538waYJfyFvUn5KEI5CEvnpqgKDnL6LHbtpjUp/bL0XYFMx0OZ2hKLvVhqJlN+q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-pzjw8c+4YT/k65FZ2uUHs6p05ISZQ5kP7ib5ExO5qDmI5pkA1BjceKiYU2+sMTD0" crossorigin="anonymous"></script>

    <script>
      // Add an event listener to the delete button
      document.querySelector('.btn-danger').addEventListener('click', function () {
          // Show the modal by adding the 'show' class to it
          document.getElementById('staticBackdrop').classList.add('show');
          // Add the 'modal-open' class to the body to prevent scrolling
          document.body.classList.add('modal-open');
          // Remove the 'modal-backdrop' element if it exists
          var backdrop = document.querySelector('.modal-backdrop');
          if (backdrop) {
              backdrop.remove();
          }
      });

      // Add an event listener to the modal close button
      document.querySelector('.btn-close').addEventListener('click', function () {
          // Hide the modal by removing the 'show' class
          document.getElementById('staticBackdrop').classList.remove('show');
          // Remove the 'modal-open' class from the body
          document.body.classList.remove('modal-open');
      });
    </script>

</body>
</html>

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