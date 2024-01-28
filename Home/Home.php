<?php
    session_start();
    include_once("../ConnectionChecker.php");

    require("../Nav/Nav.php");

    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    
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
    <div class="Posts">
        <?php
            /*echo "<a href='../Profile/Profile.php?username=$Username'>
                    <img src='../DefaultPFP/DefaultPFP.png' class='PFP'>
                  </a>";*/
        ?>
        <div class="Name">
           <?php
               //echo "<a href='../Profile/Profile.php?username=$Username' class='Name'>$Name</a>";
           ?>
        </div>
        <div class="Username">
           <?php
              //echo $Username;
           ?>
        </div>
        <div class="Post">
                <?php 
                    //echo $Content;
                ?>
        </div>
        <form action="Home.php" method="get">
        <button type="submit" name="logout">Log out</button>
    </form>
    </div>

</body>
</html>