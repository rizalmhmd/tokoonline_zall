<?php
include '../inc/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM produk WHERE id = $id");

echo "<script>alert('Produk berhasil dihapus'); window.location='index.php';</script>";
?>
