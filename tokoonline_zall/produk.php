<?php include 'inc/db.php'; ?>
<?php include 'inc/header.php'; ?>

<style>
    .produk-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .produk-container h2 {
        text-align: center;
        color: #ff5722;
        margin-bottom: 30px;
    }

    .produk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .produk-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        padding: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .produk-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .produk-card h3 {
        color: #ff5722;
        margin: 0 0 10px;
        font-size: 18px;
    }

    .produk-card p {
        color: #555;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .produk-card .harga {
        font-weight: bold;
        color: #e64a19;
        font-size: 16px;
        margin-bottom: 12px;
    }

    .produk-card a {
        display: inline-block;
        background-color: #ff9800;
        color: white;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .produk-card a:hover {
        background-color: #e68900;
    }
</style>

<div class="produk-container">
    <h2>🛍️ Daftar Produk Kami</h2>
    <div class="produk-grid">
        <?php
        $result = $conn->query("SELECT * FROM produk");
        while ($row = $result->fetch_assoc()):
        ?>
            <div class="produk-card">
                <img src="uploads/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama']); ?>"
     onerror="this.onerror=null;this.src='uploads/jawir.jpeg';"
     style="width:100%; border-radius:8px; margin-bottom:10px;">
                <h3><?= htmlspecialchars($row['nama']); ?></h3>
                <p><?= htmlspecialchars($row['deskripsi']); ?></p>
                <div class="harga">Rp<?= number_format($row['harga']); ?></div>
                <a href="proses/tambah_keranjang.php?id=<?= $row['id']; ?>">+ Beli</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
