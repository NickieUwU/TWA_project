<?php
    session_start();
    require("../ConnectionChecker.php");
    require("../DbHandler.php");
    $username = $_GET["username"];
    require("../ValidateUser.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css">
    <link rel="stylesheet" href="Messages.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="Messages.js"></script>
</head>
<body>
    <?php
        include("../Nav/Nav.php");
    ?>
    <div class="whereamI">
           <label class="lblMyProfile">Messages</label>
    </div>
    <div class="layout">
        <div class="UsersMessage">
            <div id="NewMessageRedirect">
                <i class="bi bi-envelope-fill"></i> New message
            </div>
        </div>
    </div>
    
</body>
</html>