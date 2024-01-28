<?php
    session_start();
    require("../ConnectionChecker.php");
    include("../Nav/Nav.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <div class="whereamI">
        <label class="lblMyProfile">Home</label>
    </div>

    <div class="post">
        <img src="../DefaultPFP/DefaultPFP.png" alt="Profile picture" class="PFP">
        <div class="post-info">
            <p class="name"><?php echo $Name; ?></p>
            <p class="handler"><?php echo $Username; ?></p>
            <p class="date">Post date creation</p>
        </div>
        <div class="post-text">
            <p><?php echo $Content; ?></p>
        </div>
    </div>
</body>
</html>