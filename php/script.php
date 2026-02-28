<!DOCTYPE html>
<html>

<head>
    <title>PHP Test</title>
    <?php
    $payload = $_GET['payload'];
    ?>
    <script>
        var payload = "<?php echo $payload; ?>";
        console.log(payload);
        alert(payload);
    </script>
</head>

<body>
    <?php echo '<p>Hello World</p>'; ?>
</body>

</html>