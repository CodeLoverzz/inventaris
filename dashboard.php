<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>
<p>Selamat datang, <?= $_SESSION['username']; ?></p>

<a href="barang/index.php">Data Barang</a> |
<a href="auth/logout.php">Logout</a>

</body>
</html>
