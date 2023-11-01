<?php
$conn = mysqli_connect("localhost", "root", "", "livechat");
if (!$conn) {
    echo "Connection Failed" . mysqli_connect_error() or die();
}
date_default_timezone_set('Asia/Jakarta');
