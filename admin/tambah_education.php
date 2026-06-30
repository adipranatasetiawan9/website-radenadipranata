<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/database.php";

if(isset($_POST['simpan'])){

    $institusi = $_POST['institusi'];
    $jurusan = $_POST['jurusan'];
    $masuk = $_POST['tahun_masuk'];
    $lulus = $_POST['tahun_lulus'];
    $keterangan = $_POST['keterangan'];

    $conn->query("INSERT INTO education
    (institusi,jurusan,tahun_masuk,tahun_lulus,keterangan)
    VALUES
    ('$institusi','$jurusan','$masuk','$lulus','$keterangan')");

    header("Location: education.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Education</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Tambah Data Pendidikan</h2>

<form method="post">

<p>Institusi</p>
<input type="text" name="institusi" required>

<p>Jurusan</p>
<input type="text" name="jurusan" required>

<p>Tahun Masuk</p>
<input type="number" name="tahun_masuk" required>

<p>Tahun Lulus</p>
<input type="number" name="tahun_lulus" required>

<p>Keterangan</p>
<textarea name="keterangan" rows="5"></textarea>

<br><br>

<button type="submit" name="simpan">
Simpan
</button>

</form>

<br>

<a href="education.php">Kembali</a>

</body>
</html>
