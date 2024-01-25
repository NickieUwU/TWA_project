<?php
    session_start();
    include("../DbHandler.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="Signin.css">
</head>
<body>
    <h1 class="h1Signin">Sign in</h1>
    <form class="lblSignin" action="Signin.php" method="post">
        <?php
            $warning = "";
            if($_SERVER["REQUEST_METHOD"] === "POST")
            {
                $name = $_POST["Name"];
                $_username = $_POST["Username"];
                $username = "@".$_username;
                $password = $_POST["Password"];

                if(isset($name) && isset($username) && isset($password))
                {
                    Db::connect("localhost", "sin", "root", "");
                    $query = Db::query("SELECT * FROM users WHERE username=?", $username);

                    if($result && $result->rowCount() > 0)
                    {
                        $warning = "user already registered";
                    }
                    else
                    {
                        
                    }
                }
            }
        ?>
        <label><?php echo $warning ?></label>
        <input type="text" name="Name" placeholder="Name" autocomplete="off"><br>
        <input type="text" name="Username" placeholder="Username" autocomplete="off"><br> 
        <input type="password" name="Password" placeholder="Password" autocomplete="off"><br>
        <button type="submit">Sign in</button>
    </form>
    <p class="PYesAccnt">
        Already registered?<br>
        <a class="linkLogin" href="../Login/Login.php">Log in</a>
    </p>
</body>
</html>