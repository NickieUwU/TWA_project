<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET["username"];
    require("../ValidateUser.php");
    Db::connect("localhost", "sin", "root", "");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="Messages.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php
        include("../Nav/Nav.php");
    ?>
    <div class="whereamI">
           <label class="lblMyProfile">Messages</label>
    </div>
    <div class="layout">
        <div class="UsersMessage">
            <div id="NewMessageRedirect">
                <i class="bi bi-envelope-fill"></i> New message
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
    $LoggedUsers = Db::queryAll("SELECT * FROM users WHERE Username=?", $_GET["username"]);
    foreach($LoggedUsers as $LoggedUser)
    {
        $LoggedID = $LoggedUser["ID"];
        $LoggedUsername = $LoggedUser["Username"];
    }
    $Followings = Db::queryAll("SELECT * FROM follow WHERE LoggedID=?", $LoggedID);
    foreach($Followings as $Following)
    {
        $FollowedUserID = $Following["ID"];
    }
    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
?>
<script>
    document.getElementById("NewMessageRedirect").addEventListener("click", function() {
        let bg = document.querySelector(".layout");
        bg.innerHTML += "<div class='ChooseUser'><?php echo "Placeholder" ?></div>";
    });
</script>