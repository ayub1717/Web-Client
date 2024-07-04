<?php
$path = '../koneksi.php'; // Menggunakan ../ untuk naik satu level dari folder home.php

// Memanggil koneksi.php
require_once $path;

// Periksa apakah parameter ID tersedia dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus file gambar dari server
    $sql = "SELECT foto FROM data_komponen WHERE id = $id";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto = $row['foto'];
        if (file_exists($foto)) {
            unlink($foto); // Hapus file gambar
        }
    }

    // Hapus data dari database
    $sql = "DELETE FROM data_komponen WHERE id = $id";
    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
    header("Location: home.php"); // Redirect ke halaman admin home setelah penghapusan
    exit();
} else {
    echo "No ID provided.";
}
?>
