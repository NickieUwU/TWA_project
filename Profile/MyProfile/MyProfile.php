<?php
    include_once("../ConnectionChecker.php");
    require("../Nav/Nav.php");
    $username = $_SESSION["username"];
?>
    <div class="whereamI">
           <label class="lblMyProfile">Profile</label>
    </div>
    <div class="User">
        <div class="Username">
            <?php
                echo $username;
            ?>
        </div>
    </div>