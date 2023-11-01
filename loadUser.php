<?php
include "config.php";
session_start();

if (isset($_SESSION['email'])) {
    $sql = "SELECT * FROM user WHERE email ='" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        echo '<input type="hidden" name="user_id" id="user_id" value="' . $row['id'] . '">';
    }
}
