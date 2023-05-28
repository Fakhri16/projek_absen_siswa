<?php 

session_start();
$title = "Login";
require_once __DIR__ ."/Layouts/template.php";
require_once __DIR__ ."/connection.php";

$error = "";

if(isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);

    $row = mysqli_num_rows($result);

    if($row > 0){
        $passwordHash = mysqli_fetch_assoc($result);
        if(password_verify($password,$passwordHash['password'])){
            $_SESSION['login'] = true;
            header('Location: index.php');
        } else {
            $error = "password tidak valid";
        }
    } else {
        $error = "username dan password tidak valid";
    }

}

?>

<div class="container">
    <h2 class="text-center"><?= $title ?></h2>
    <form action="" method="post">
        <?php if($error != ""){ ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
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
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>