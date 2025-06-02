<?php
include 'inc/db.php';
include 'inc/header.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];
?>

<style>
    .keranjang-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .keranjang-container h2 {
        text-align: center;
        color: #ff5722;
        margin-bottom: 25px;
    }

    .keranjang-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }

    .keranjang-item:last-child {
        border-bottom: none;
    }

    .keranjang-item p {
        margin: 0;
        font-size: 16px;
        color: #444;
    }

    .keranjang-item .subtotal {
        font-weight: bold;
        color: #e64a19;
    }

    .hapus-btn {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 13px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .hapus-btn:hover {
        background-color: #d32f2f;
    }

    .total-box {
        text-align: right;
        margin-top: 20px;
        font-size: 18px;
        color: #333;
    }

    .total-box strong {
        color: #e64a19;
    }
</style>

<div class="keranjang-container">
    <h2>🛒 Keranjang Belanja</h2>

    <?php
    $stmt = $conn->prepare("
        SELECT keranjang.id, produk.nama, produk.harga, keranjang.jumlah
        FROM keranjang
        JOIN produk ON keranjang.produk_id = produk.id
        WHERE keranjang.user_id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $total = 0;
    while ($row = $result->fetch_assoc()):
        $subtotal = $row['harga'] * $row['jumlah'];
        $total += $subtotal;
    ?>
        <div class="keranjang-item">
            <p><?= htmlspecialchars($row['nama']); ?> (<?= $row['jumlah']; ?>)</p>
            <p class="subtotal">Rp<?= number_format($subtotal); ?></p>
            <a class="hapus-btn" href="proses/hapus_keranjang.php?id=<?= $row['id']; ?>">Hapus</a>
        </div>
    <?php endwhile; ?>

    <div class="total-box">
        <strong>Total: Rp<?= number_format($total); ?></strong>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
