<?php
    session_start();
    include("../DbHandler.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="Login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
</head>
<body>
    <h1 class="h1Login">Log in</h1>
    <form class="lblLogin" action="Login.php" method="post">
        <?php
            
            $warning = "";
            if (isset($_POST["btnLogIn"])) 
            {
                $_username = $_POST["Username"];
                $password = $_POST["Password"];
                $username = "@".$_username;
                if(isset($username) && isset($password))
                {
                    Db::connect("localhost", "sin", "root", "");
                    $Users = Db::queryAll("SELECT * FROM users WHERE Username=?", $username);
                    if($Users)
                    {
                        foreach($Users as $User)
                        {
                            $Name = $User["Name"];
                            $hash = $User["Password"];
                        }
                        
                        if(password_verify($password, $hash))
                        {
                            $_SESSION["username"] = $username;
                            $_SESSION["name"] = $Name;
                            $_SESSION["login"] = true;
                            header("Location: ../Home/Home.php");
                            exit();
                        }
                        else
                        {
                            $warning = "Incorrect password";
                            //temporary
                            /*$_SESSION["username"] = $username;
                            $_SESSION["name"] = $Name;
                            $_SESSION["login"] = true;
                            header("Location: ../Home/Home.php");*/
                        }
                        
                    }
                    else
                    {
                        $warning = "user was not found";
                    }
                }
            }
        ?>
        <label><?php echo $warning ?></label>
        <input type="text" name="Username" placeholder="Username" autocomplete="off"><br> 
        <input type="password" name="Password" placeholder="Password"><br>
        <button type="submit" name="btnLogIn">Log in</button>
    </form>
    <p class="PNoAccnt">
        Don't have an account yet?<br>
        <a class="linkSignIn" href="../Signin/Signin.php">Sign in</a>
    </p>
</body>
</html>