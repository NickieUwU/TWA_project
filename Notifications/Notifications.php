<?php
    session_start();
    require("../DbHandler.php");
    require("../ConnectionChecker.php");
    Db::connect("localhost", "sin", "root", "");
    $LoggedUsers = Db::queryAll("SELECT * FROM users WHERE username=?", $_SESSION["username"]);
    foreach($LoggedUsers as $LoggedUser)
    {
        $LoggedID = $LoggedUser["ID"];
        
    }
    $follows = Db::queryAll("SELECT * FROM follow WHERE LoggedID=?", $LoggedID);
    foreach($follows as $follow)
    {
        $ID = $follow["ID"];
        
    }
    $Whos = Db::queryAll("SELECT * FROM follow WHERE ID=?", $ID);
    foreach($Whos as $Who)
    {
        $IsNotified = $Who["IsChecked"];
    }
    $users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
    foreach($users as $user)
    {
        $Name = $user["Name"];
        $Username = $user["Username"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications / Sin</title>
    <link rel="stylesheet" href="Notifications.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>"> 
</head>
<body>
    <div class="whereamI">
           <label class="lblMyProfile">Notifications</label>
    </div>
    <?php
        include("../Nav/Nav.php");
    ?>
    <div class="Notifications">
        <?php
            if($IsNotified == 0)
            {
                $Notifications = Db::queryAll("SELECT * FROM follow WHERE ID=? AND LoggedID=? AND IsChecked=?", $ID, $LoggedID, $IsNotified);
                foreach($Notifications as $Notification)
                {
                    echo '
                    <div class="Notification">
                        <a href="../Profile/Profile.php?username='.$Username.'">
                            <img src="../DefaultPFP/DefaultPFP.png" alt="Profile picture" class="PFP">
                        </a>
                        <a href="../Profile/Profile.php?username='.$Username.'">'.$Name.'</a> just followed you!
                    </div><br>';
                }
            }
        ?>
    </div>
</body>
</html>

<script>
    document.addEventListener("close", () => {
        /*var form = event.target;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);
        xhr.onload = function() {
            if (this.status == 200) 
            {
                    var btnHeart = document.getElementById("btnHeartID");
                    btnHeart.innerText = (btnHeart.innerText === "like") ? "liked" : "like";
            }
        };
        xhr.send(formData);*/
    });
</script>