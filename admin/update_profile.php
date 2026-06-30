<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/database.php";

$nama = $_POST['nama'];
$profesi = $_POST['profesi'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE profile SET
    nama='$nama',
    profesi='$profesi',
    email='$email',
    telepon='$telepon',
    alamat='$alamat',
    deskripsi='$deskripsi'
WHERE id=1";

$conn->query($sql);

header("Location: profile.php");
exit;
?>
