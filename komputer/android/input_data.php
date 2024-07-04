<?php
header("Content-Type: application/json");
include 'koneksi.php';
// Get the posted data
$data = json_decode(file_get_contents("php://input"));
// Validate the data
if (!isset($data->nama_komponen) || !isset($data->jenis)|| !isset($data->merk)|| !isset($data->detail)) {
 die(json_encode(["error" => "Invalid input"]));
}
$nama_komponen = $koneksi->real_escape_string($data->nama_komponen);
$jenis = $koneksi->real_escape_string($data->jenis);
$merk = $koneksi->real_escape_string($data->merk);
$detail = $koneksi->real_escape_string($data->detail);

$sql = "INSERT INTO data_komponen (nama_komponen, jenis, merk, detail) VALUES ('$nama_komponen', 
'$jenis','$merk','$detail')";
if ($koneksi->query($sql) === TRUE) {
 echo json_encode(["success" => true]);
} else {
 echo json_encode(["error" => $koneksi->error]);
}
$koneksi->close();