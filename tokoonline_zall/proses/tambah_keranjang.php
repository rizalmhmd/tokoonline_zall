<?php
session_start();
include '../inc/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

$produk_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

// Cek apakah produk sudah ada di keranjang user
$cek = $conn->prepare("SELECT * FROM keranjang WHERE produk_id = ? AND user_id = ?");
$cek->bind_param("ii", $produk_id, $user_id);
$cek->execute();
$result = $cek->get_result();

if ($row = $result->fetch_assoc()) {
    // Kalau sudah ada, tambahkan jumlah
    $jumlah = $row['jumlah'] + 1;
    $update = $conn->prepare("UPDATE keranjang SET jumlah = ? WHERE id = ?");
    $update->bind_param("ii", $jumlah, $row['id']);
    $update->execute();
} else {
    // Kalau belum ada, masukkan baru
    $insert = $conn->prepare("INSERT INTO keranjang (produk_id, jumlah, user_id) VALUES (?, 1, ?)");
    $insert->bind_param("ii", $produk_id, $user_id);
    $insert->execute();
}

header("Location: ../keranjang.php");
exit;
?>
