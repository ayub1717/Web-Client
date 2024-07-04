<?php
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$komponenId = end($parts); 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "db_komputer";

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "DELETE FROM data_komponen WHERE id = '$komponenId'"; // Ganti 'users' dengan nama tabel Anda
if (mysqli_query($conn, $sql)) {
    echo "Pengguna dengan ID $komponenId telah dihapus.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>