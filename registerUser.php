<?php
include "config.php";
session_start();

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$type = 'user';

$sql = "SELECT* FROM user WHERE email= '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
} else {
    $sqlInsert = "INSERT INTO user (name, email, type) VALUES ('$name', '$email', '$type')";
    $resultInsert = mysqli_query($conn, $sqlInsert);

    if ($resultInsert) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
    }
}
