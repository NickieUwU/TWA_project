<?php
    session_start();
    require("../DbHandler.php");
    require("../ConnectionChecker.php");

    if(isset($_GET["searchbar"]))
    {
        $search = $_GET["searchbar"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search / Sin</title>
    <link rel="stylesheet" href="../UniversalCSS/UniversalStyles.css">
    <link rel="stylesheet" href="../Nav/Nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Search.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include("../Nav/Nav.php"); ?>
    <div class="whereamI">
        <label class="lblMyProfile">Search</label>
    </div>
    <form action="Search.php" method="get" id="FormSearch">
        <div class="search">
            <input type="search" class="srchbar" name="searchbar" placeholder="Search" autocomplete="off">
            <input type="submit" value="Search" id="btnSearch">
        </div>
    </form>
    <div class="SearchResults"></div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById("FormSearch").addEventListener("submit", (e) => {
        e.preventDefault();
        let form = e.target;
        let formData = new FormData(form);

        let xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);

        xhr.onload = () => {
            if(xhr.status === 200){
                
            }
        };
        xhr.send(formData);
    });
</script>
