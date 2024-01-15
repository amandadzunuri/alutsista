<?php
//session_start();
//include("../php/config.php");

// Mendapatkan data dari form login
//$username = $_POST['username'];
//$password = $_POST['password'];

// Melakukan query ke database
//$query = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
//$result = $conn->query($query);

// Memeriksa hasil query
//if ($result->num_rows > 0) {
    // Login berhasil
   // $_SESSION['username'] = $username;
   // echo "<script>alert('Login successful. Welcome, $username!'); window.location.href='../index.php';</script>";
//} else {
    // Login gagal
    //echo "Login failed. Please check your username and password.";
//}

//$conn->close();

// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include("../php/config.php");
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from tb_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../home/home.php");
 
	// cek jika user login sebagai pegawai
	}elseif ($data['role']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:../home/home.php"); 
	}	
} else{
	header("location:../home/home.php");
}
?>