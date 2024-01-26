<?php
    error_reporting(E_ALL & ~E_WARNING);
    session_start();
    
    // Check if the user is not logged in
    include_once("../ConnectionChecker.php");

    require("../Nav/Nav.php");

    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    $get_username = Db::query("SELECT Username FROM users WHERE Username=?", $_SESSION["username"]);
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
             <div class="Username">
                <?php
                    echo $get_username;
                ?>
             </div>
                
             
    </div>

</body>
</html>