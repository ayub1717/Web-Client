<?php
$path = '../koneksi.php'; // Menggunakan ../ untuk naik satu level dari folder home.php

// Memanggil koneksi.php
require_once $path;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_komponen'];
    $jenis = $_POST['jenis'];
    $merk = $_POST['merk'];
    $detail = $_POST['detail'];
    $foto = $_FILES['foto']['name'];

    // Upload foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "INSERT INTO data_komponen (nama_komponen, jenis, merk, detail, foto) VALUES ('$nama', '$jenis', '$merk', '$detail', '$target_file')";

    if ($koneksi->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
    header("Location: home.php"); // Redirect to admin home page
    exit();
}
?>
