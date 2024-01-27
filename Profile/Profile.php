<?php
    session_start();
    require("../ConnectionChecker.php");
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
    <img src="../DefaultPFP/DefaultPFP.png" class="PFP">
    <div class="whereamI">
           <label class="lblMyProfile">Profile</label>
    </div>
    <div class="User">
        <div class="Name">
            Name
        </div>
        <div class="Username">
            @Username
        </div>
    </div>
</body>
</html>
