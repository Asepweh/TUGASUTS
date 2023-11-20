<?php
require './../config/db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {
            // Successful login, redirect to the "show.php" page
            header("Location: show.php");
            exit();
        } else {
            echo "Password salah";
            die;
        }
    } else {
        echo "Email atau password salah";
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<a class="btn btn-primary" href="show.php" role="button">Tampilkan Produk</a>

</body>
</html>
