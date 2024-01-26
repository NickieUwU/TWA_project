<?php
    include("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");
    $query = Db::query("SELECT * FROM users WHERE username=?", $username);
?>
<nav>
    <a class="navmenu" href="../Home/Home.php">
        Home
    </a><br>
    <a class="navmenu" href="../Home/Home.php">
        Discover
    </a><br>
    <a class="navmenu" href="../Home/Home.php">
        Messages
    </a><br>
    <a class="navmenu" href="../Profile/Profile.php?username=<?php echo $_SESSION["username"]; ?>">
        Profile
    </a><br>
</nav>