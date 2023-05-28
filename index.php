<?php 

session_start();
$title = "Halaman Sudah Login";
require_once __DIR__."/Layouts/template.php";


if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <h1>Sukses Login</h1>
</body>
</html>