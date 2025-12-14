<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}


if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/database.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama    = $_POST['nama_barang'];
    $jumlah  = $_POST['jumlah'];
    $lokasi  = $_POST['lokasi'];
    $kondisi = $_POST['kondisi'];

if ($jumlah < 0) {
    $jumlah = 0;
}

    mysqli_query($conn, "UPDATE barang SET
        nama_barang='$nama',
        jumlah='$jumlah',
        lokasi='$lokasi',
        kondisi='$kondisi'
        WHERE id=$id");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>

<a href="../dashboard.php">Dashboard</a> |
<a href="index.php">Data Barang</a> |
<a href="../auth/logout.php">Logout</a>
<hr>

<h2>Edit Barang</h2>

<form method="post">
    <input type="text" name="nama_barang" value="<?= $row['nama_barang']; ?>" required><br><br>
    <input type="number" name="jumlah" value="<?= $row['jumlah']; ?>" required><br><br>
    <input type="text" name="lokasi" value="<?= $row['lokasi']; ?>"><br><br>

    <select name="kondisi">
        <option value="baik" <?= $row['kondisi']=='baik'?'selected':''; ?>>Baik</option>
        <option value="rusak" <?= $row['kondisi']=='rusak'?'selected':''; ?>>Rusak</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
