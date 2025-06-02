<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php"); // atau sesuaikan path-nya
    exit;
}

if ($_SESSION['user']['role'] !== 'admin') {
    echo "Akses ditolak.";
    exit;
}
?>


<?php
include '../inc/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $conn->query("UPDATE produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id=$id");
    echo "<script>alert('Produk berhasil diperbarui'); window.location='index.php';</script>";
}
?>

<?php include '../inc/header.php'; ?>
<div class="container">
    <h2>Edit Produk</h2>
    <form method="post">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required><?= htmlspecialchars($row['deskripsi']); ?></textarea><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
<?php include '../inc/footer.php'; ?>
