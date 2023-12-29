<?php
session_start();
include("config.php");

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan query ke database
$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $username;
    echo "<script>alert('Login successful. Welcome, $username!'); window.location.href='../index.html';</script>";
} else {
    // Login gagal
    echo "Login failed. Please check your username and password.";
}

$conn->close();
?>