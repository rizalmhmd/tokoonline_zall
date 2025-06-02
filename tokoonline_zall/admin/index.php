<?php include '../inc/db.php'; ?>
<?php include '../inc/header.php'; ?>

<style>
    .admin-container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 10px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .admin-container h2 {
        text-align: center;
        color: #ff5722;
        margin-bottom: 30px;
    }

    .add-button {
        display: inline-block;
        background-color: #ff9800;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 20px;
        transition: background 0.3s;
    }

    .add-button:hover {
        background-color: #e68900;
    }

    .product-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .product-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fafafa;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 10px 15px;
        transition: box-shadow 0.3s;
    }

    .product-card:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .product-info img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .product-details {
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .product-price {
        color: #ff5722;
        font-weight: bold;
        font-size: 14px;
    }

    .action-buttons a {
        background: #2196F3;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        margin-left: 8px;
        font-size: 13px;
        text-decoration: none;
        transition: background 0.2s;
    }

    .action-buttons a:hover {
        background: #1976D2;
    }

    .action-buttons .delete {
        background: #f44336;
    }

    .action-buttons .delete:hover {
        background: #d32f2f;
    }
</style>

<div class="admin-container">
    <h2>📦 Admin - Daftar Produk</h2>
    <a href="tambah_produk.php" class="add-button">+ Tambah Produk</a>

    <div class="product-list">
        <?php
        $result = $conn->query("SELECT * FROM produk");
        while ($row = $result->fetch_assoc()):
            $gambar = htmlspecialchars($row['gambar']);
            $gambarPath = file_exists("../uploads/$gambar") ? "../uploads/$gambar" : "../uploads/jawir.jpeg";
        ?>
            <div class="product-card">
                <div class="product-info">
                    <img src="<?= $gambarPath; ?>" alt="<?= htmlspecialchars($row['nama']); ?>">
                    <div class="product-details">
                        <div class="product-name"><?= htmlspecialchars($row['nama']); ?></div>
                        <div class="product-price">Rp<?= number_format($row['harga']); ?></div>
                    </div>
                </div>
                <div class="action-buttons">
                    <a href="edit_produk.php?id=<?= $row['id']; ?>">✏️ Edit</a>
                    <a href="hapus_produk.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Yakin ingin menghapus produk ini?');">🗑️ Hapus</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include '../inc/footer.php'; ?>
