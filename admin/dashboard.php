<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>

<body>

<h1>Dashboard Admin</h1>

<hr>

<h3>Selamat Datang,
<?php echo $_SESSION['admin']; ?>
</h3>

<p>Content Management System</p>

<ul>

<li><a href="../index.php">🏠 Lihat Website</a></li>

<li><a href="profile.php">👤 Profile</a></li>

<li><a href="education.php">🎓 Education</a></li>

<li><a href="#">💼 Experience</a></li>

<li><a href="#">📁 Portfolio</a></li>

<li><a href="#">🖼 Gallery</a></li>

<li><a href="#">🏅 Certificates</a></li>

<li><a href="#">📝 Blog</a></li>

<li><a href="#">📩 Pesan Contact</a></li>

<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</body>
</html>
