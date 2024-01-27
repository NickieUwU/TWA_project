<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET["username"];
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
    <link rel="stylesheet" href="ProfileEdit.css">
<body>
    <?php 
        include("../Nav/Nav.php");
    ?>
    <div class="whereamI">
           <label class="lblMyProfile">Edit profile</label>
    </div>
    <div class="EditUsernameDiv">
        <form action="ProfileEdit.php?username=$username" method="post">

        </form>
    </div>
</body>
</html>