<?php
include "../config.php";
session_start();

$user_id = $_POST['reply'];
$admin_id = $_POST['admin_id'];
$message = $_POST['message'];

$userInsert = "INSERT INTO message (message, user_id, ref_id, time) VALUES ('" . $message . "','" . '1' . "', '2', '" . date('Y-m-d H:i:s') . "') ";
$userInsertResult = mysqli_query($conn, $userInsert);
