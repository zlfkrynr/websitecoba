<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqly_query($conn, $sql);
    if ($result->num_row > 0 ) {
        $row = mysqly_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    } else {
        echo "<script>alert('Woops! Email or Password is wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="password" name="password" value="<?php echo $_POST['password'] ?>">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Tidak Punya Akun ? <a href="register.php">Buat Akun</a></p>
        </form>
    </div>
</body>
</html>