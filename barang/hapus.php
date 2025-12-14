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
mysqli_query($conn, "DELETE FROM barang WHERE id=$id");

header("Location: index.php");
exit;
