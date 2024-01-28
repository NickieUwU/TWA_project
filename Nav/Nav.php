<nav>
    <a class="navmenu" href="../Home/Home.php">
        Home
    </a><br>
    <a class="navmenu" href="../CreatePost/CreatePost.php?username=<?php echo $_SESSION["username"];?>">
        Create
    </a><br>
    <a class="navmenu" href="../Messages/Messages.php?username=<?php echo $_SESSION["username"]; ?>">
        Messages
    </a><br>
    <a class="navmenu" href="../Profile/Profile.php?username=<?php echo $_SESSION["username"];?>">
        Profile
    </a><br>

    <?php
        if (isset($_GET["logout"])) {
            session_unset();
            session_destroy();
            header("Location: ../Login/Login.php");
            exit();
        }
    ?>
</nav>

