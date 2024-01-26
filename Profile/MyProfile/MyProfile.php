<?php
    include_once("../ConnectionChecker.php");
    require("../Nav/Nav.php");
    
?>
    <div class="whereamI">
           <label class="lblMyProfile">Profile</label>
    </div>
    <div class="User">
        <div class="Username">
            <?php
                echo $_SESSION["username"];
            ?>
        </div>
    </div>