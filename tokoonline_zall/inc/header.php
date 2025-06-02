<?php
session_start(); // PENTING untuk akses $_SESSION
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Online</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }

        nav {
            background: linear-gradient(90deg, #ff5722, #ff9800);
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffe0b2;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-right: 40px;
            color: white;
            text-decoration: none;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        hr {
            display: none;
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-container">
        <a href="/tokoonline_zall/index.php" class="logo">🛒 TokoZall</a>
        <div class="nav-links">
            <a href="/tokoonline_zall/index.php">Beranda</a>
            <a href="/tokoonline_zall/produk.php">Produk</a>
            <a href="/tokoonline_zall/keranjang.php">Keranjang</a>

            <?php if (isset($_SESSION['user'])): ?>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/tokoonline_zall/admin/index.php">Admin</a>
                <?php endif; ?>
                <a href="/tokoonline_zall/logout.php">Logout (<?= htmlspecialchars($_SESSION['user']['nama']); ?>)</a>
            <?php else: ?>
                <a href="/tokoonline_zall/login.php">Login</a>
                <a href="/tokoonline_zall/register.php">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
