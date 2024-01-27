<?php
    session_start();
    $username = $_GET["username"];
    require("../DbHandler.php");
    require("../ConnectionChecker.php");
    require("../ValidateUser.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="CreatePost.css">
</head>
<body>
    <?php
        include("../Nav/Nav.php");
    ?>
</body>
</html>