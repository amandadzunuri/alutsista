<?php
    session_start();

    // Hancurkan semua data sesi
    session_destroy();

    // Redirect ke halaman login setelah logout
    header("Location: ../index.php");
    exit;
?>
