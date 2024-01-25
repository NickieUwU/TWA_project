<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="NewUserVerify.js"></script>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
</head>
<body>
    <form action="NewUserVerify.php" method="post">
        <div id="verification_content"></div>
        <input type="radio" name="verification_radio" value="e-mail" id="email" onchange="changecontent()" checked>e-mail<br>
        <input type="radio" name="verification_radio" value="Telephone" id="telephone" onchange="changecontent()">Telephone<br>
        <button type="submit">Verify</button>
    </form>
</body>
</html>