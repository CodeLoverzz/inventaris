<?php
session_start();


if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/database.php";

if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama_barang'];
    $jumlah  = $_POST['jumlah'];
    $lokasi  = $_POST['lokasi'];
    $kondisi = $_POST['kondisi'];

if ($jumlah < 0) {
    $jumlah = 0;
}
    mysqli_query($conn, "INSERT INTO barang 
        (nama_barang, jumlah, lokasi, kondisi)
        VALUES ('$nama', '$jumlah', '$lokasi', '$kondisi')");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
<a href="../dashboard.php">Dashboard</a> |
<a href="index.php">Data Barang</a> |
<a href="../auth/logout.php">Logout</a>
<hr>

<h2>Tambah Barang</h2>

<form method="post">
    <input type="text" name="nama_barang" placeholder="Nama Barang" required><br><br>
    <input type="number" name="jumlah" placeholder="Jumlah" required><br><br>
    <input type="text" name="lokasi" placeholder="Lokasi"><br><br>

    <select name="kondisi">
        <option value="baik">Baik</option>
        <option value="rusak">Rusak</option>
    </select><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
