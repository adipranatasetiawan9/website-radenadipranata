<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "../config/database.php";

$id=$_GET['id'];

$conn->query("DELETE FROM education WHERE id=$id");

header("Location: education.php");

?>
