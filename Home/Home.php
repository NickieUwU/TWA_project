<?php
    session_start();
    require("../ConnectionChecker.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="../Post/Post.css">

</head>
<body>
    <?php include("../Nav/Nav.php"); ?>
    <?php include("../Post/Post.php"); ?>
    <div class="whereamI">
        <label class="lblMyProfile">Home</label>
    </div>

</body>
</html>