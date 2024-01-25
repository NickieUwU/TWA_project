<?php
    include("../DbHandler.php");
    $warning = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $username = $_POST["Username"];
        $password = $_POST["Password"];

        if (empty($username) && empty($password)) {
            $warning = "Please fill the form";
        } elseif (empty($username)) {
            $warning = "Please provide a username";
        } elseif (empty($password)) {
            $warning = "Please provide a password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sin</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
</head>
<body>
    <h1 class="h1Login">Login</h1>
    <form class="lblLogin" action="Login.php" method="post">
        <label><?php echo $warning ?></label>
        <input type="text" name="Username" placeholder="Username" autocomplete="off"><br> 
        <input type="password" name="Password" placeholder="Password"><br>
        <button type="submit">Log in</button>
    </form>
    <p class="PNoAccnt">
        Don't have an account yet?<br>
        <a class="linkSignIn" href="../Signin/Signin.php">Sign in</a>
    </p>
</body>
</html>