<?php include '../inc/db.php'; ?>
<?php include '../inc/header.php'; ?>

<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
    <label>Nama Produk</label><br>
    <input type="text" name="nama"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <label>Harga</label><br>
    <input type="number" step="0.01" name="harga"><br><br>

    <label>Gambar Produk</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, '../uploads/' . $gambar);

    $sql = "INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', '$harga', '$gambar')";
    if ($conn->query($sql)) {
        echo "<p style='color:green;'>Produk berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:red;'>Gagal menambahkan produk: {$conn->error}</p>";
    }
}
?>

<?php include '../inc/footer.php'; ?>
