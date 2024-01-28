<?php
    session_start();
    include_once("../ConnectionChecker.php");

    require("../Nav/Nav.php");

    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    $Users = Db::queryAll("SELECT * FROM users");
    
    if (!empty($Users)) 
    {
        // Randomly select an index from the array of users
        $randomIndex = array_rand($Users);

        // Get the user at the randomly selected index
        $randomUser = $Users[$randomIndex];

        // Extract the ID from the randomly selected user
        $ID = $randomUser["ID"];
    }
    
    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
    foreach($Users as $User)
    {
        $Name = $User["Name"];
        $Username = $User["Username"];
    }
    $Posts = Db::queryAll("SELECT * FROM posts WHERE ID=?", $ID);
    foreach($Posts as $Post)
    {
        $Content = $Post["Content"];
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
    <div class="Posts">
        <?php
            echo "<a href='../Profile/Profile.php?username=$Username'>
                    <img src='../DefaultPFP/DefaultPFP.png' class='PFP'>
                  </a>";
        ?>
        <div class="Name">
           <?php
               echo "<a href='../Profile/Profile.php?username=$Username' class='Name'>$Name</a>";
           ?>
        </div>
        <div class="Username">
           <?php
              echo $Username;
           ?>
        </div>
        <div class="Post">
                <?php 
                    echo $Content;
                ?>
        </div>
        <form action="Home.php" method="get">
        <button type="submit" name="logout">Log out</button>
    </form>
    </div>

</body>
</html>