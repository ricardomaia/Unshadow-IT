<?php
session_start();
setcookie("SecretCookie", "SECRET_VALUE");
?>
<?php include('header.php'); ?>

<section class="section">
    <div class="container">
        <h1 class="title">
            Headless
        </h1>

        <label for=txt_height">height:</label><br />
        <input type="text" id="txt_height" placeholder="heigth" value="changeme" /><br />
        <label for=txt_width">width:</label><br />
        <input type="text" id="txt_width" placeholder="width"><br />

        <button onclick="display_window_size();">Display Window Size</button>
    </div>
</section>



<script>
    function display_window_size() {
        var txt_height = document.getElementById('txt_height');
        var txt_width = document.getElementById('txt_width');

        txt_height.value = window.screen.height;
        txt_width.value = window.screen.width;
    }
</script>
<?php include('footer.php'); ?>