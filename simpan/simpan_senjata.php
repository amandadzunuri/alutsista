<?php
    include ("../php/config.php");

    if(isset($_POST['kode'])){

        // mengambil data dari form
        $nama_alutsista = $_POST["nama"];
        $kode_identitas = $_POST["kode"];
        $merk = $_POST["merk"];
        $model = $_POST["model"];

        $jenis_senjata = $_POST["jenis"];
        $ukuran_kaliber = $_POST["kaliber"];
        $kapasitas_megazen = $_POST["kapasitas"];
        $panjang_laras = $_POST["panjang"];
        $bahan_konstruksi = $_POST["bahan"];
        $bobot_senjata = $_POST["bobot"];
        $kecepatan_peluru = $_POST["kecepatan"];

        $tanggal_pembelian = $_POST["tanggal_pembelian"];
        $lokasi_saat_ini = $_POST["lokasi"];
        $status_alutsista = $_POST["status"];
        $tanggal_perbaikan = $_POST["tanggal_perbaikan"];
        $jenis_perbaikan = $_POST["jenis_perbaikan"];
       
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
        $sql = "INSERT INTO tb_senjata (nama, kode, merk, model, jenis, kaliber, kapasitas, panjang, bahan, bobot, kecepatan, tanggal_pembelian, lokasi, status, tanggal_perbaikan, jenis_perbaikan, gambar) 
        VALUES ('$nama_alutsista', '$kode_identitas', '$merk', '$model', '$jenis_senjata', '$ukuran_kaliber', '$kapasitas_megazen', '$panjang_laras', '$bahan_konstruksi', '$bobot_senjata', '$kecepatan_peluru', '$tanggal_pembelian', '$lokasi_saat_ini', '$status_alutsista', '$tanggal_perbaikan', '$jenis_perbaikan', '$target_file')";

        // kondisi jika sukses menambahkan data
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<script>alert('Data added successful'); window.location.href='../aset/aset.php';</script>";
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