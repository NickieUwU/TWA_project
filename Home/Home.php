<?php
    session_start();
    
    // Check if the user is not logged in
    if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
        session_unset();
        session_destroy();
        header("Location: ../Login/Login.php");
        exit();
    }
    
    echo $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../UniversalCSS//UniversalStyles.css">
</head>
<body>
    <form action="Home.php" method="post">
        <button type="submit" name="logout">Log out</button>
    </form>

    <?php
        if (isset($_POST["logout"])) {
            session_unset();
            session_destroy();
            header("Location: ../Login/Login.php");
            exit();
        }
    ?>
</body>
</html>