<?php
session_start();
include "../config/database.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION['login'] = true;
$_SESSION['admin'] = $username;

header("Location: dashboard.php");
exit();

    } else {

        $error = "Username atau Password salah!";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Admin</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
}

.login{

width:350px;
margin:100px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);

}

input{

width:100%;
padding:10px;
margin:10px 0;

}

button{

width:100%;
padding:10px;
background:#007BFF;
color:white;
border:none;
cursor:pointer;

}

.error{

color:red;

}

</style>

</head>

<body>

<div class="login">

<h2>Login Admin</h2>

<?php
if($error!=""){
echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
name="login">
Login
</button>

</form>

</div>

</body>
</html>
