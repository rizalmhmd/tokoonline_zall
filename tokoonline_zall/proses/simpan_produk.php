<?php
include '../inc/db.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$conn->query("INSERT INTO produk (nama, harga, deskripsi) VALUES ('$nama', $harga, '$deskripsi')");
header("Location: ../admin/index.php");
?>
