<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="NewUserVerify.js"></script>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../NewUserVerify/NewUserVerify.css">
</head>
<body onload="changecontent()">
    <form class="form_verify" action="NewUserVerify.php" method="post">
        <div id="verification_content" class="verification"></div>
        <input type="radio" name="verification_radio" value="e-mail" id="email" onchange="changecontent()" checked><label class="typeText">E-mail</label><br>
        <input type="radio" name="verification_radio" value="Telephone" id="telephone" onchange="changecontent()"><label class="typeText">Telephone</label><br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>

<?php
    if($_POST)
    {
        header("Location: ../Home/Home.php");
    }
?>