<?php
    error_reporting(E_ALL & ~E_WARNING);
    session_start();
    
    include_once("../ConnectionChecker.php");

    require("../Nav/Nav.php");

    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    $Users = Db::queryAll("SELECT * FROM users WHERE Username=?", $_SESSION["username"]);
    foreach($Users as $User)
    {
        $Name = $User["Name"];
        $Username = $User["Username"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS//UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <div class="whereamI">
           <label onclick="refreshPage()" class="lblHome">Home</label>
            <script>
                function refreshPage() 
                {
                    location.reload();
                }
            </script>
    </div>
    <div class="posts">
             <img src="../DefaultPFP/DefaultPFP.png" class="PFP">
             <div class="Name">
                <?php
                    echo "<a href='../Profile/Profile.php?username=$Username' class='Name'>$Name</a>";
                ?>
             </div>
    </div>

</body>
</html>