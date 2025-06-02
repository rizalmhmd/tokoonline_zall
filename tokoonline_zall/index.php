<?php include 'inc/db.php'; ?>
<?php include 'inc/header.php'; ?>

<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    color: #333;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}
.hero {
    background: linear-gradient(90deg, #ff5722, #ff9800);
    color: white;
    padding: 60px 20px;
    border-radius: 10px;
    text-align: center;
}
.hero h1 {
    font-size: 48px;
    margin: 0;
}
.hero p {
    font-size: 20px;
    margin: 10px 0 20px;
}
.hero a {
    display: inline-block;
    background: white;
    color: #ff5722;
    padding: 12px 24px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s;
}
.hero a:hover {
    background: #ffe0b2;
}
.features {
    display: flex;
    justify-content: space-around;
    margin-top: 40px;
    text-align: center;
}
.feature {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    width: 30%;
}
.feature:hover {
    transform: translateY(-5px);
}
.feature h3 {
    color: #ff5722;
    margin-bottom: 10px;
}
.feature p {
    color: #555;
}
</style>

<div class="container">
    <div class="hero">
        <h1>Selamat Datang di Toko Online</h1>
        <p>Temukan produk terbaik dengan harga terjangkau seperti di Shopee!</p>
        <a href="produk.php">Lihat Produk</a>
    </div>

    <div class="features">
        <div class="feature">
            <h3>🛍️ Produk Menarik</h3>
            <p>Beragam produk pilihan dengan desain menarik dan harga kompetitif.</p>
        </div>
        <div class="feature">
            <h3>🛒 Keranjang Praktis</h3>
            <p>Belanja lebih mudah dan cepat dengan fitur keranjang pintar kami.</p>
        </div>
        <div class="feature">
            <h3>🛠️ Admin Mudah</h3>
            <p>Kelola produk dan toko Anda dengan dashboard admin yang sederhana.</p>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
