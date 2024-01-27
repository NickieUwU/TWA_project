<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET['username'];
    Db::connect("localhost", "sin", "root", "");
    $Users = Db::queryAll("SELECT * FROM  users WHERE Username=?", $username);
    foreach($Users as $User)
    {
        $name = $User["Name"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="Profile.css">
</head>
<body>
    <?php
        require("../Nav/Nav.php");
    ?>
    <div class="whereamI">
           <label class="lblMyProfile">Profile</label>
    </div>
    <div class="User">
        <img src="../DefaultPFP/DefaultPFP.png" class="PFP">
        <div class="Name">
            <?php
                echo $name;
            ?>
        </div>
        <div class="Username">
            <?php
                echo $username;
            ?>
        </div>
    </div>
</body>
</html>
