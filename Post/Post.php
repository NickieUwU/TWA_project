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
        $Post_ID = $Post["Post_ID"];
        $Content = $Post["Content"];
        $Date = $Post["PostCreation"];
    }

    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
    foreach($Users as $User)
    {
        $Name = $User["Name"];
        $Username = $User["Username"];
    }

    $_LoggedUser = Db::queryAll("SELECT * FROM users WHERE Username=?", $_SESSION["username"]);
    foreach($_LoggedUser as $LoggedUser)
    {
        $LoggedID = $LoggedUser["ID"];
    }
    $IsLiked = "0";
    $Likes = Db::queryAll("SELECT * FROM likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
    foreach($Likes as $Like)
    {
        $IsLiked = $Like["Liked"];
    }

    function liked($IsLiked, $LoggedID, $Post_ID)
    {
        if($IsLiked == 0)
            {
                $IsLiked == 1;
                Db::query("INSERT INTO likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
            }
            if($IsLiked == 1)
            {
                $IsLiked = 0;
            }
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
    <div class="actions" id="actionID">
        <div class="heart" id="heart">
            <?php
            if($IsLiked == 0) {
                echo "<i class='bi bi-heart' id='likeIcon' onclick='ExecuteLike()'></i>";
            }
            if($IsLiked == 1) {
                echo "<i class='bi bi-heart-fill' id='likeIcon' onclick='ExecuteLike()'></i>";
            }
            ?>  
        </div>
        <div class="comments">
           <a href="../ExpandedPost/ExpandedPost.php/<?php echo $Post_ID?>">
                <i class="bi bi-chat-left-dots-fill"></i>
           </a> 
        </div>
    </div>
</div>
