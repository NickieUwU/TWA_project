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
    <title>Document</title>
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
</body>
</html>