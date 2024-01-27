<?php
    if($_SESSION["username"] != $username)
    {
        header("location: ../ProfileEdit/ProfileEdit.php?username=".$_SESSION["username"]);
        exit;
    }
?>