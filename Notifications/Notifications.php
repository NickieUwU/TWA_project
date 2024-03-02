<?php
    session_start();
    require("../DbHandler.php");
    require("../ConnectionChecker.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications / Sin</title>
    <link rel="stylesheet" href="Notifications.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Nav/Nav.php"> 
</head>
<body>
    <div class="whereamI">
           <label class="lblMyProfile">Notifications</label>
    </div>
    <?php
        include("../Nav/Nav.php");
    ?>
</body>
</html>