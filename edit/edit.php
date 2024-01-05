<?php
include("../php/config.php");

// Check if the 'kode' parameter is set in the URL
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Fetch the details from the database based on the kode using a prepared statement
    $qselect_kendaraan = "SELECT * FROM kendaraan WHERE kode = ?";
    $stmt = $conn->prepare($qselect_kendaraan);
    $stmt->bind_param('s', $kode);  // 's' indicates a string, adjust accordingly if it's an integer or other type
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found
    if ($result->num_rows > 0) {
        $data_select_kendaraan = $result->fetch_assoc();

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

     <style>
        body {
            background-color: #FFFAE2;
            font-family: 'Poppins';
        }

        .form {
            background: #445D48;
            border-radius: 0.9375rem;
            padding: 3%;
        }

        .label-style {
        color: #ffffff;
        text-align: left;
        font-size: 1.15rem;
        }

        .input-style {
            border: 1px solid #ced4da;
            background-color: rgba(255, 255, 255, 0);
            color: #ffffff;
        }

        .btn {
            border-radius: 0.625rem;
            background:  #445D48;
            height: 5rem;
            color: #ffffff;
        }
    </style>

    <title>Tambah Alutsista</title>
</head>
<body >

    <div class="container  text-center mt-4 w-75">
        <div class="text-center rec; mt-4" style=" height: 6.25rem; flex-shrink: 0; border-radius: 15px; background: #001524; ">
            <h3 style="color: #ffffff; text-align: center; padding-top: 16px; font-size: 3rem; ">EDIT ALUTSISTA</h3>
        </div>

        <form action ="../php/simpan_kendaraan.php" method="POST" enctype="multipart/form-data" class="form-container">      
            <div class="mt-4" style="text-align: left;">
                <h5>Informasi Umum*</h5>
                <div class="form mt-2 w-100" >
                    
                    <div class="mb-4 row">
                        <label for="nama3" class="col-sm-3 col-form-label label-style">Nama Alutsista:</label>
                        <div class="col-sm-9">
                            <input type="nama" class="form-control input-style" id="nama3" name="nama" value="<?php echo $data_select_kendaraan['nama'] ?>">
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="kode3" class="col-sm-3 col-form-label label-style">Kode Identitas:</label>
                        <div class="col-sm-9">
                            <input type="kode" class="form-control input-style" id="kode3" name="kode" value="<?php echo $data_select_kendaraan['kode'] ?>">
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="merk3" class="col-sm-3 col-form-label label-style">Merk:</label>
                        <div class="col-sm-9">
                            <input type="merk" class="form-control input-style" id="merk3" name="merk" value="<?php echo $data_select_kendaraan['merk'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <label for="model3" class="col-sm-3 col-form-label label-style">Model:</label>
                        <div class="col-sm-9">
                            <input type="model" class="form-control input-style" id="model3" name="model" value="<?php echo $data_select_kendaraan['model'] ?>">
                        </div>
                    </div>

                </div>
            </div>

            <div class="kendaraan mt-4" style="text-align: left;">
                            <h5>Spesifikasi Teknis Kendaraan*</h5>
                            <div class="form t-2 w-100">

                                <div class="mb-4 row">
                                    <label for="jenis3" class="col-sm-3 col-form-label label-style">Jenis Kendaraan:</label>
                                    <div class="col-sm-9">
                                        <input type="jenis" class="form-control input-style" id="jenis3" name="jenis" value="<?php echo $data_select_kendaraan['jenis'] ?>">
                                    </div>
                                </div>
                            
                                <div class="mb-4 row">
                                    <label for="berat3" class="col-sm-3 col-form-label label-style">Berat Tempur:</label>
                                    <div class="col-sm-9">
                                        <input type="berat" class="form-control input-style" id="berat3" name="berat" value="<?php echo $data_select_kendaraan['berat'] ?>">
                                    </div>
                                </div>
                            
                                <div class="mb-4 row">
                                    <label for="ukuran3" class="col-sm-3 col-form-label label-style">Ukuran Kendaraan:</label>
                                    <div class="col-sm-9">
                                        <input type="ukuran" class="form-control input-style" id="ukuran3" name="ukuran" value="<?php echo $data_select_kendaraan['ukuran'] ?>">
                                    </div>
                                </div>
                            
                                <div class="mb-4 row">
                                    <label for="kapasitas3" class="col-sm-3 col-form-label label-style">Kapasitas Awak:</label>
                                    <div class="col-sm-9">
                                        <input type="kapasitas" class="form-control input-style" id="kapasitas3" name="awak" value="<?php echo $data_select_kendaraan['awak'] ?>">
                                    </div>
                                </div>
                            
                                <div class="mb-4 row">
                                    <label for="persenjataan3" class="col-sm-3 col-form-label label-style">Persenjataan Utama:</label>
                                    <div class="col-sm-9">
                                        <input type="persenjataan" class="form-control input-style" id="persenjataan3" name="senjata_utama" value="<?php echo $data_select_kendaraan['senjata_utama'] ?>">
                                    </div>
                                </div>
                            
                                <div class="mb-4 row">
                                    <label for="kecepatan3" class="col-sm-3 col-form-label label-style">Kecepatan Maksimal:</label>
                                    <div class="col-sm-9">
                                        <input type="kecepatan" class="form-control input-style" id="kecepatan3" name="kecepatan" value="<?php echo $data_select_kendaraan['kecepatan'] ?>">
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <label for="sistem3" class="col-sm-3 col-form-label label-style">Sistem Navigasi:</label>
                                    <div class="col-sm-9">
                                        <input type="sistem" class="form-control input-style" id="sistem3" name="sistem_navigasi" value="<?php echo $data_select_kendaraan['sistem_navigasi'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="riwayat mt-4" style="text-align: left;">
            <h5>Riwayat Aset*</h5>
            <div class="form mt-2 w-100">
                    <div class="row mb-4">
                        <label for="tgl_beli3" class="col-sm-3 col-form-label label-style">Tanggal Pembelian:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control input-style" id="tgl_beli3" name="tanggal_pembelian" value="<?php echo $data_select_kendaraan['tanggal_pembelian'] ?>">
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <label for="lokasi3" class="col-sm-3 col-form-label label-style">Lokasi Saat Ini:</label>
                        <div class="col-sm-9">
                            <input type="lokasi" class="form-control input-style" id="lokasi3" name="lokasi" value="<?php echo $data_select_kendaraan['lokasi'] ?>">
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <label for="status3" class="col-sm-3 col-form-label label-style">Status Alutsista:</label>
                        <div class="col-sm-9">
                            <input type="status" class="form-control input-style" id="status3" name="status" value="<?php echo $data_select_kendaraan['status'] ?>">
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <label for="tgl_perbaikan3" class="col-sm-3 col-form-label label-style">Tanggal Perbaikan:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control input-style" id="tgl_perbaikan3" name="tanggal_perbaikan" value="<?php echo $data_select_kendaraan['tanggal_perbaikan'] ?>">
                        </div>
                    </div>
                
                    <div class="row">
                        <label for="jns_perbaikan3" class="col-sm-3 col-form-label label-style">Jenis Perbaikan:</label>
                        <div class="col-sm-9">
                            <input type="jns_perbaikan" class="form-control input-style" id="jns_perbaikan3" name="jenis_perbaikan" value="<?php echo $data_select_kendaraan['jenis_perbaikan'] ?>">
                        </div>
                    </div>
            </div>
        </div>

        <div class="mt-4" style="text-align: left;">
        <h5>Upload gambar*</h5>
        <input type="hidden" name="gambar_lama" value="<?php echo $data_select_kendaraan['gambar']; ?>">
            <div class="form text-center rec" style="height: 25rem; border-radius: 15px; background: #445D48; display: flex; justify-content: center; align-items: center;">
                <label for="gambar" style="border: none; background: none; cursor: pointer;">
                    <input type="file" id="gambar" name="gambar" style="display: none;" onchange="displayImage(this)">
                     <img src="../img/add.png" alt="" class="img-fluid" >
                </label>
             </div>
        </div>           
        <button class="btn btn-primary mt-4 w-100 fw-bold "  type="submit">Submit</button>
        <a href="../index.php" class="btn btn-warning mt-4 mb-4 w-100 fw-bold "  type="submit">Batal</a>
     </form>
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