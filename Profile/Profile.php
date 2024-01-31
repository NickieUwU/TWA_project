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
        $followers = $User["Followers"];
        $following = $User["Following"];
    }
    $follows = Db::queryAll("SELECT * FROM follow WHERE ID=? AND LoggedID=?", $username, $_SESSION["username"]);
    if($follows)
    {
        foreach($follows as $follow)
        {
            $IsFollowed = $follow["IsFollowed"];
        }
    }
    else
    {
        $IsFollowed = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$name ($username)" ?> / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Profile.css?v=<?php echo time(); ?>">
</head>
<body>
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
                        echo "<a href='../ProfileEdit/ProfileEdit.php?username=$username'>
                                <input type='submit' name='edit' id='IDedit' value='edit'>
                              </a>";
                    }
                    else
                    {
                        echo "<form action='Profile.php?username=$username' method='post' id='IDform'>
                                <input type='submit' name='follow' value='follow'>
                              </form>";
                    }
                ?>
        </div>
        <div class="Followers">
            <?php
                if($followers == 1)
                {
                    echo "$followers follower";
                }
                else
                {
                    echo "$followers followers";
                }
            ?>
        </div>
        <div class="Following">
            <?php echo "$following following"; ?>
        </div>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $followers++;
        $following++;
        $dataFollowing = array("Following" => $following);
        Db::update("users", $dataFollowing, "WHERE ID=?", $_SESSION["username"]);
        $dataFollower = array("Followers" => $followers);
        Db::update("users", $dataFollower, "WHERE username=?", $username);
    }
?>