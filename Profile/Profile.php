<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET['username'];
    Db::connect("localhost", "sin", "root", "");
    $Users = Db::queryAll("SELECT * FROM  users WHERE Username=?", $username);
    foreach($Users as $User)
    {
        $name = $User["Name"];
        $bio = $User["Bio"];
        $joined = $User["Joined"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$name ($username)" ?> / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="Profile.css">
</head>
<body>
    <form method="post" action="Profile.php">
        <?php
            require("../Nav/Nav.php");
        ?>
        <div class="whereamI">
            <label class="lblMyProfile">Profile</label>
        </div>
        <div class="User">
            <img src="../DefaultPFP/DefaultPFP.png" class="PFP">
            <div class="Name">
                <?php
                    echo $name;
                ?>
            </div>
            <div class="Username">
                <?php
                    echo $username;
                ?>
            </div>
            <div class="Bio">
                <?php
                    echo $bio;
                ?>
            </div>
            <div class="JoinedDate">
                <?php echo "Joined $joined"; ?>
            </div>
            <div class="Action">
                
                        <?php
                            if($_SESSION["username"] == $username)
                            {
                                echo "<input type='submit' name='edit' value='edit'>";
                            }
                            else
                            {
                                echo "<input type='submit' name='follow' value='follow'>";
                            }
                        ?>
                    
            </div>
        </div>
    </form>
</body>
</html>

<?php
    if($_POST)
    {
        $btnEdit = $_POST["edit"];
        $btnFollow = $_POST["follow"];

        if(isset($btnEdit))
        {
            echo "editing";
        }

        elseif(isset($btnFollow))
        {
            echo "following";
        }
    }
?>