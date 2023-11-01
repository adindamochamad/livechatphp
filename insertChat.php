<?php
include "config.php";
session_start();

$user_id = $_POST['user_id'];
$admin_id = $_POST['admin_id'];
$message = $_POST['message'];

$sqlInsert = "INSERT INTO message (message, user_id, ref_id, time) VALUES ('" . $message . "', '" . $user_id . "', '" . $_SESSION['admin'] . "'  ,'" . date('Y-m-d H:i:s') . "')";
$resultInsert = mysqli_query($conn, $sqlInsert);
