<?php

$path = '../koneksi.php'; // Menggunakan ../ untuk naik satu level dari folder home.php

// Memanggil koneksi.php
require_once $path;
// Periksa jika ada aksi 'getData' yang dikirimkan melalui GET
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'getData') {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM data_komponen WHERE id = $id";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row); // Kirimkan data barang dalam format JSON
    } else {
        echo json_encode(['error' => 'No record found.']); // Kirimkan pesan kesalahan jika tidak ada data
    }
    exit();
}

// Periksa jika metode HTTP adalah POST (saat mengirimkan formulir update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_komponen = $_POST['nama_komponen'];
    $jenis = $_POST['jenis'];
    $merek = $_POST['merk'];
    $detail = $_POST['detail'];
    $foto = $_FILES['foto']['name'];


    // Lakukan pembaruan data barang di database
    // Contoh query update, sesuaikan dengan struktur tabel dan koneksi database Anda
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $sql = "UPDATE data_komponen SET nama_komponen='$nama_komponen', jenis='$jenis', merk='$merek', detail='$detail', foto='$target_file' WHERE id = $id";


    if ($koneksi->query($sql) === TRUE) {
        echo "Record updated successfully"; // Kirimkan pesan sukses ke AJAX
    } else {
        echo "Error updating record: " . $koneksi->error; // Kirimkan pesan error ke AJAX
    }

    $koneksi->close();
    exit();
}
?>
