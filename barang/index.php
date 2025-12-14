<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/database.php";
$data = mysqli_query($conn, "SELECT * FROM barang ORDER BY id DESC");

$keyword = '';
if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    $data = mysqli_query($conn, "SELECT * FROM barang 
        WHERE nama_barang LIKE '%$keyword%'");
} else {
    $data = mysqli_query($conn, "SELECT * FROM barang ORDER BY id DESC");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
<a href="../dashboard.php">Dashboard</a> |
<a href="index.php">Data Barang</a> |
<a href="../auth/logout.php">Logout</a>
<hr>

<h2>Data Barang</h2>

<form method="get">
    <input type="text" name="cari" placeholder="Cari barang..." value="<?= $keyword ?>">
    <button type="submit">Cari</button>
</form>
<br>

<a href="tambah.php">Tambah Barang</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Lokasi</th>
        <th>Kondisi</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td><?= $row['lokasi']; ?></td>
        <td><?= $row['kondisi']; ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
$total = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM barang");
$sum = mysqli_fetch_assoc($total);
?>

<p><strong>Total Stok:</strong> <?= $sum['total']; ?></p>

<br>
<a href="../dashboard.php">Kembali</a>

</body>
</html>
