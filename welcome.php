<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index,php")
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <?php echo "<h1>Welcome" . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
</body>
</html>