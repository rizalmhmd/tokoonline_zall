<?php
include '../inc/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM keranjang WHERE id=$id");
header("Location: ../keranjang.php");
?>
