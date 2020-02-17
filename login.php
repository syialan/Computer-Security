<?php
include "db/koneksi.php";

session_start();

if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($login);
        session_start();
        // set session
        $_SESSION['login'] = true;

        // cek remember me
        if (isset($_POST['remember'])) {
            // buat cookie dengan waktu 1 menit
            setcookie('login', 'true', time() + 60);
        }

        header("location: index.php");
    } else {
        header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="" method="post">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>

                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>

                <input type="password" placeholder="Password" name="password" required>
            </div>

            <input type="checkbox" name="remember"> Remember Me.
            <input type="submit" class="btn-submit" value="Sign In" name="login">
        </div>
    </form>
</body>

</html>