<?php
include("../php/config.php");

// Check if the 'kode' parameter is set in the URL
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Delete the record from the 'senjata' table based on the 'kode' column
    $query = "DELETE FROM tb_senjata WHERE kode = '$kode'";
    
    // Execute the query
    if ($conn->query($query) === TRUE) {
        $conn->close();
        echo "<script>alert('Data deleted successful'); window.location.href='../aset/aset.php';</script>";
    } else {
        $conn->close();
        header("location: ../aset/aset.php");
    }
} else {
    echo "Invalid request";
}
?>
