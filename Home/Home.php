<?php
    session_start();
    require("../ConnectionChecker.php");
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../Post/Post.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include("../Nav/Nav.php"); ?>
    <div class="whereamI">
        <label class="lblMyProfile">Home</label>
    </div>
    <?php include("../Post/Post.php"); ?>
</body>
</html>

<?php
    if($_POST["NameDeleteContent"])
    {
        require("../DbHandler.php");
        Db::connect("localhost", "sin", "root", "");
        Db::query("DELETE FROM posts WHERE Post_ID=?", $Post_ID);
        echo $Post_ID;
    }
?>