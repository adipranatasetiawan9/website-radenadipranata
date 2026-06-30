<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/database.php";

$data = $conn->query("SELECT * FROM profile LIMIT 1");
$row = $data->fetch_assoc();

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $conn->query("UPDATE profile SET
        nama='$nama',
        profesi='$profesi',
        email='$email',
        telepon='$telepon',
        alamat='$alamat',
        deskripsi='$deskripsi'
        WHERE id=1");

    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Profile</title>

</head>

<body>

<h2>Edit Profile</h2>

<form action="update_profile.php" method="post">

Nama<br>
<input type="text" name="nama"
value="<?php echo $row['nama']; ?>">

<br><br>

Profesi<br>
<input type="text" name="profesi"
value="<?php echo $row['profesi']; ?>">

<br><br>

Email<br>
<input type="email" name="email"
value="<?php echo $row['email']; ?>">

<br><br>

Telepon<br>
<input type="text" name="telepon"
value="<?php echo $row['telepon']; ?>">

<br><br>

Alamat<br>
<input type="text" name="alamat"
value="<?php echo $row['alamat']; ?>">

<br><br>

Deskripsi<br>

<textarea
name="deskripsi"
rows="6"
cols="60"><?php echo $row['deskripsi']; ?></textarea>

<br><br>

<button name="update">
Simpan Perubahan
</button>

</form>

<br>

<a href="dashboard.php">
Kembali ke Dashboard
</a>

</body>

</html>
