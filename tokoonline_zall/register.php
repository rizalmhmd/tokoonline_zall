<?php
include 'inc/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password !== $konfirmasi) {
        $error = "❌ Password dan konfirmasi tidak cocok.";
    } else {
        // Cek email sudah digunakan
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->fetch_assoc()) {
            $error = "❌ Email sudah digunakan.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'user')");
            $stmt->bind_param("sss", $nama, $email, $hashed);
            $stmt->execute();
            $success = "✅ Berhasil mendaftar. Silakan login.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Toko Online</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ff9800, #ff5722);
            margin: 0;
            padding: 0;
        }

        .register-container {
            max-width: 420px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #ff5722;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #e64a19;
        }

        .login-link {
            margin-top: 15px;
            display: block;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link:hover {
            color: #ff5722;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>📝 Daftar Akun</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error; ?></div>
    <?php elseif ($success): ?>
        <div class="success"><?= $success; ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="konfirmasi" placeholder="Konfirmasi Password" required><br>
        <button type="submit">Daftar</button>
    </form>

    <a class="login-link" href="login.php">Sudah punya akun? Login di sini</a>
</div>

</body>
</html>
