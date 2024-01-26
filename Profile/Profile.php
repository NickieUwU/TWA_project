<?php
session_start();
include("../DbHandler.php");
require("../ConnectionChecker.php");

$username = $_SESSION["username"];
Db::connect("localhost", "sin", "root", "");

$userData = Db::queryOne("SELECT * FROM users WHERE Username=?", $username);

if ($userData) {
    $storedUsername = $userData['Username'];
    $URL_username = $_GET['username'] ?? null;
    if ($URL_username && $URL_username === $username) 
    {
        include("./MyProfile/MyProfile.php");
    } 
    else 
    {
        include("./NotMyProfile/NotMyProfile.php");
    }
} 
else 
{
    echo "User not found in the database.";
}
?>
