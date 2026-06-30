<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/database.php";

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM education WHERE id='$id'");
$row = $data->fetch_assoc();

if(isset($_POST['update'])){

    $institusi = $_POST['institusi'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $keterangan = $_POST['keterangan'];

    $conn->query("UPDATE education SET
        institusi='$institusi',
        jurusan='$jurusan',
        tahun_masuk='$tahun_masuk',
        tahun_lulus='$tahun_lulus',
        keterangan='$keterangan'
        WHERE id='$id'");

    header("Location: education.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Education</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<h2>Edit Data Pendidikan</h2>

<form method="post">

<p>Institusi</p>
<input type="text" name="institusi" value="<?= $row['institusi']; ?>">

<p>Jurusan</p>
<input type="text" name="jurusan" value="<?= $row['jurusan']; ?>">

<p>Tahun Masuk</p>
<input type="number" name="tahun_masuk" value="<?= $row['tahun_masuk']; ?>">

<p>Tahun Lulus</p>
<input type="number" name="tahun_lulus" value="<?= $row['tahun_lulus']; ?>">

<p>Keterangan</p>

<textarea name="keterangan" rows="5"><?= $row['keterangan']; ?></textarea>

<br><br>

<button name="update">
Update Data
</button>

</form>

<br>

<a href="education.php">
Kembali
</a>

</body>
</html>
