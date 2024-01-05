<?php
    include "config.php";

    $nama_alutsista = $_POST["nama"];
    $kode_identitas = $_POST["kode"];
    $merk = $_POST["merk"];
    $model = $_POST["model"];
    $jenis_kendaraan = $_POST["jenis"];
    $berat_tempur = $_POST["berat"];
    $ukuran_kendaraan = $_POST["ukuran"];
    $kapasitas_awak = $_POST["awak"];
    $persenjataan_utama = $_POST["senjata_utama"];
    $kecepatan_maksimal = $_POST["kecepatan"];
    $sistem_navigasi = $_POST["sistem_navigasi"];
    $tanggal_pembelian = $_POST["tanggal_pembelian"];
    $lokasi_saat_ini = $_POST["lokasi"];
    $status_alutsista = $_POST["status"];
    $tanggal_perbaikan = $_POST["tanggal_perbaikan"];
    $jenis_perbaikan = $_POST["jenis_perbaikan"];
    

    if(isset($_POST['kode'])){

        //Kondisi Update
        // $gambar_lama = isset($_POST['gambar_lama']) ? $_POST['gambar_lama'] : "";
        // $nama_gambar = isset($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : "";
        $gambar_lama = $_POST['gambar_lama'];
        $nama_gambar = $_FILES['gambar']['name'];

        if (!empty($nama_gambar)) {
            // Jika ada file baru diunggah
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            $error = false;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            //cek apakah file termasuk gambar atau bukan
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $error = false;
            } else {
                echo "File is not an image.";
                $error = true;
            }
    
            //cek ukuran gambar
            if ($_FILES["gambar"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $error = true;
            }
            
            //gambar yang diizinkan
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $error = true;
            }

            // Upload file baru
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["gambar"]["name"]) . " has been uploaded.";
                $gambar = $target_file; // Perubahan nama variabel di sini
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Jika tidak ada file baru diunggah, gunakan nama file lama
            $gambar = $gambar_lama;
        }

        //perintah mySQL untuk update data
        $sql = "UPDATE kendaraan SET 
        nama = '$nama_alutsista',
        kode = '$kode_identitas',
        merk = '$merk',
        model = '$model',
        jenis = '$jenis_kendaraan',
        berat = '$berat_tempur',
        ukuran = '$ukuran_kendaraan',
        awak = '$kapasitas_awak',
        senjata_utama = '$persenjataan_utama',
        kecepatan = '$kecepatan_maksimal',
        sistem_navigasi = '$sistem_navigasi',
        tanggal_pembelian = '$tanggal_pembelian',
        lokasi = '$lokasi_saat_ini',
        status = '$status_alutsista',
        tanggal_perbaikan = '$tanggal_perbaikan',
        jenis_perbaikan = '$jenis_perbaikan',
        gambar = '".$gambar."' 
        WHERE kode = '$kode_identitas';";

        // kondisi jika sukses menambahkan data
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<script>alert('Update successful'); window.location.href='../aset/aset.php';</script>";
        exit();
        } 
        // kondisi jika gagal menambahkan data
        else {
            $conn->close();
            header("location: ../aset/aset.php");
        exit();
        }
    } else{ 

        // mengambil data dari form

        
        //periksa apakah filefoto diunggah
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $error = false;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $error = false;
            } else {
                echo "File is not an image.";
                $error = false;
            }
        }       

        // cek duplikasi
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $error = true;
        }

        //cek ukuran gambar
        if ($_FILES["gambar"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $error = true;
        }
        
        // cek format gambar
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $error = true;
        }

        // validasi error
        if ($error == true) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // query tambah data kendaraan
        $sql = "INSERT INTO kendaraan (nama, kode, merk, model, jenis, berat, ukuran, awak, senjata_utama, kecepatan, sistem_navigasi, tanggal_pembelian, lokasi, status, tanggal_perbaikan, jenis_perbaikan, gambar) 
        VALUES ('$nama_alutsista', '$kode_identitas', '$merk', '$model', '$jenis_kendaraan', '$berat_tempur', '$ukuran_kendaraan', '$kapasitas_awak', '$persenjataan_utama', '$kecepatan_maksimal', '$sistem_navigasi', '$tanggal_pembelian', '$lokasi_saat_ini', '$status_alutsista', '$tanggal_perbaikan', '$jenis_perbaikan', '$target_file')";

        // kondisi jika sukses menambahkan data
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("location: ../aset/aset.php");
        exit();
        } 
        // kondisi jika gagal menambahkan data
        else {
            $conn->close();
            header("location: ../aset/aset.php");
        exit();
        }
    }
?>