<nav>
    <a class="navmenu" href="../Home/Home.php">
        Home
    </a><br>
    <a class="navmenu" href="../Home/Home.php">
        Create
    </a><br>
    <a class="navmenu" href="../Home/Home.php">
        Messages
    </a><br>
    <a class="navmenu" href="../Profile/Profile.php?username=<?php echo $_SESSION["username"];?>">
        Profile
    </a><br>
    <form action="Home.php" method="get">
        <button type="submit" name="logout">Log out</button>
    </form>

    <?php
        if (isset($_GET["logout"])) {
            session_unset();
            session_destroy();
            header("Location: ../Login/Login.php");
            exit();
        }
    ?>
</nav>

