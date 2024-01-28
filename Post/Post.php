<?php
    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");

    // Get a random user ID
    $Users = Db::queryAll("SELECT ID FROM users ORDER BY RAND() LIMIT 1");
    foreach($Users as $User)
    {
        $ID = $User["ID"];
    }

    // Get a random post from the user
    $Posts = Db::queryAll("SELECT * FROM posts WHERE ID=? ORDER BY RAND() LIMIT 1", $ID);
    foreach($Posts as $Post)
    {
        $Content = $Post["Content"];
        $Date = $Post["PostCreation"];
    }

    // Get the user's name and username
    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
    foreach($Users as $User)
    {
        $Name = $User["Name"];
        $Username = $User["Username"];
    }
?>
    <div class="post">
        <img src="../DefaultPFP/DefaultPFP.png" alt="Profile picture" class="PFP">
        <div class="post-info">
            <p class="name"><?php echo $Name; ?></p>
            <p class="handler"><?php echo $Username; ?></p>
            
        </div>
        <div class="date">
            <p class="date"><?php echo $Date; ?></p>
        </div>
        <textarea class="post-text" readonly><?php echo $Content; ?></textarea>
    </div>