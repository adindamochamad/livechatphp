<?php
include "../config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="chatHeader">
            <h2>ADMIN</h2>
        </div>

        <div class="chatAreaAdmin">
            <div id="chatAdmin">
                <div id="loadChatADMIN"></div>
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
                </form>
            </div>
        </div>
    </div>
</body>

</script>

</html>