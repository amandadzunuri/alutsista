<?php
include "config.php"; // Include your database connection file

if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Perform SQL search query
    $sql = "SELECT * FROM kendaraan WHERE
        nama LIKE '%$search_query%' OR
        kode LIKE '%$search_query%' OR
        merk LIKE '%$search_query%' OR
        model LIKE '%$search_query%' OR
        jenis LIKE '%$search_query%' OR
        berat LIKE '%$search_query%' OR
        ukuran LIKE '%$search_query%' OR
        awak LIKE '%$search_query%' OR
        senjata_utama LIKE '%$search_query%' OR
        kecepatan LIKE '%$search_query%' OR
        sistem_navigasi LIKE '%$search_query%' OR
        tanggal_pembelian LIKE '%$search_query%' OR
        lokasi LIKE '%$search_query%' OR
        status LIKE '%$search_query%' OR
        tanggal_perbaikan LIKE '%$search_query%' OR
        jenis_perbaikan LIKE '%$search_query%'
        ORDER BY nama";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="row ps-4 pe-4">';
        while ($row = $result->fetch_assoc()) {
            // Display search results, customize as needed
            echo '<div class="col">';
            echo '<div class="card h-100">';
            echo '<img src="' . $row['gambar'] . '" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['nama'] . '</h5>';
            // Add more details or customize as needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p class="text-center mt-4">No results found.</p>';
    }

    $conn->close();
}
?>
