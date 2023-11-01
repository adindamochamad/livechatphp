<?php
include "config.php";
session_start();

$adminSelect = "SELECT * FROM user WHERE type = 'admin'";
$adminResult = mysqli_query($conn, $adminSelect);
if ($adminResult) {
    $adminRow = mysqli_fetch_assoc($adminResult);
    $_SESSION['admin'] = $adminRow['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <script type=text/javascript src="js/jquery.js"></script>
    <script type=text/javascript src="js/custom.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.5.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.5.0/firebase-messaging-compat.js"></script>
    <script src="firebase-config.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="chatHeader">
            <h2>LIVE CHAT</h2>
        </div>

        <div class="chatArea">
            <form id="formregister">
                <div class=" form-group">
                    <label>Nama</label>
                    <input type="text" name="name" id="name" placeholder="Nama Anda">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" placeholder=" Email Anda">
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="name" id="start" value="Start Chat">
                </div>
            </form>

            <div class="chat" style="display: none;">
                <div id="loadChat">
                    <span>User</span>
                    <p class="user"> Pesan dari User</p>
                </div>
                <div class="chatFrom">
                    <form id="chatFrom">
                        <div id="user"></div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="Message" rows="1"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="send" id="send" value="Send Message">
                        </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>