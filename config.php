<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "db_register";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connect Failed.')</script>");
}

?>