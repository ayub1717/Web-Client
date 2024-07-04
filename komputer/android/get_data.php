<?php
include 'koneksi.php';
$sql = "SELECT id, nama_komponen, jenis, merk, detail FROM data_komponen";
$result = $koneksi->query($sql);
$dataKomponen = array();
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 $dataKomponen[] = $row;
 }
}
header('Content-Type: application/json');
echo json_encode($dataKomponen);
$koneksi->close();