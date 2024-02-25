<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    $users = Db::queryAll("SELECT * FROM users WHERE Username=?", $_GET["username"]);
    $DisplayedPostID = $_GET["Post"];
    foreach($users as $user)
    {
        $Name = $user["Name"];
        $Username = $user["Username"];    
    }
    $posts = Db::queryAll("SELECT * FROM posts WHERE Post_ID=?", $_GET["Post"]);
    foreach($posts as $post)
    {
        $Post_ID = $post["Post_ID"];
        $PosterID = $post["ID"];
        $Content =  $post["Content"]; 
    }
    $Posters = Db::queryAll("SELECT * FROM users WHERE ID=?", $PosterID);
    foreach($Posters as $Poster)
    {
        $PosterName = $Poster["Name"];
    }
    if($_GET["username"] != $_SESSION["username"])
    {
        header("Location: ?Post=$DisplayedPostID&username=".$_SESSION["username"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="ExpandedPost.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include("../Nav/Nav.php"); ?>
    <div class="whereamI">
           <label class="lblMyProfile"><?php echo "$PosterName's post"; ?></label>
    </div>  
    <div class="FullPost">
        <div class="Content">
            <textarea id="IDtxtContent" class="txtContent" readonly><?php echo $Content; ?></textarea>
        </div>
    </div>
</body>
</html>