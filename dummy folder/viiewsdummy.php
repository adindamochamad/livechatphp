<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
</head>
<body>
    <div class="wrapper">
        <!-- ... -->

        <div class="chat" style="display: none;">
            <div id="loadChat"></div>
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

    <script src="<?php echo base_url('assets/js/jquery-3.7.1.js'); ?>"></script>
    <script>

        $(document).ready(function() {
            // ...
        });
    </script>
</body>
</html>
