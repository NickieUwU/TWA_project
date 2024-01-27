<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET['username']; //then grab $_SESSION and compare this to this username variable to see if it's me or not
    Db::connect("localhost", "sin", "root", "");
    $Users = Db::queryAll("SELECT * FROM  users WHERE Username=?", $username);
    foreach($Users as $User)
    {
        $name = $User["Name"];
        $bio = $User["Bio"];
        $joined = $User["Joined"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$name ($username)" ?> / Sin</title>
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
        <div class="Bio">
            <?php
                echo $bio;
            ?>
        </div>
        <div class="JoinedDate">
            <?php echo "Joined $joined"; ?>
        </div>
        <div class="Action">
                <?php
                    if($_SESSION["username"] == $username)
                    {
                        echo "<button type='button'>edit</button>";
                    }
                    else
                    {
                        echo "<button type='button'>follow</button>";
                    }
                ?>
        </div>
    </div>
</body>
</html>