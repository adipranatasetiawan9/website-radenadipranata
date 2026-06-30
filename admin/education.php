<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "../config/database.php";

$data = $conn->query("SELECT * FROM education");
?>

<!DOCTYPE html>
<html>

<head>

<title>Education</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<h1>Data Pendidikan</h1>

<hr>

<p>
<a href="tambah_education.php">➕ Tambah Data Pendidikan</a>
</p>

<table border="1" cellpadding="10">

<tr>
<th>No</th>
<th>Institusi</th>
<td>
<a href="edit_education.php?id=<?= $row['id']; ?>">Edit</a> |
<a href="#">Hapus</a>
</td>
<th>Jurusan</th>
<td>
<a href="#">Edit</a> |
<a href="#">Hapus</a>
</td>
<th>Masuk</th>
<td>
<a href="#">Edit</a> |
<a href="#">Hapus</a>
</td>
<th>Lulus</th>
<td>
<a href="#">Edit</a> |
<a href="#">Hapus</a>
</td>
</tr>

<?php
$no=1;
while($row=$data->fetch_assoc()){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['institusi']; ?></td>

<td><?= $row['jurusan']; ?></td>

<td><?= $row['tahun_masuk']; ?></td>

<td><?= $row['tahun_lulus']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">
Kembali
</a>

</body>

</html>
