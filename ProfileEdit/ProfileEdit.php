<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET["username"];
    if($_SESSION["username"] != $username)
    {
        header("location: ../Home/Home.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
</head>
<body>
    
</body>
</html>