<?php 

$title = "Register";
require_once __DIR__ ."/Layouts/template.php";
require_once __DIR__ ."/connection.php";

$error = "";
$sukses = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_num_rows($result);

    if($row > 0){
        $error = "username sudah tersedia";
    }else {
        $passwordHash = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')";
        $result = mysqli_query($connection,$query);
        $sukses = "username berhasil terdaftar, silahkan pindah ke halaman <a href='login.php' class='alert-link'>Login</a>";
    }
}
?> ?


<div class="container">
    <h2 class="text-center"><?= $title ?></h2>
    <form action="" method="post">
    <?php if($error != ""){ ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
        <?php }?>
    <?php if($sukses != ""){ ?>
        <div class="alert alert-primary" role="alert">
            <?= $sukses ?>
        </div>
        <?php }?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>