<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>


<div id="header">
    <a href="index.php">Home</a>

<?php

session_start();


if ( !empty($_SESSION['loggedin']) ) {
    $currentUser1 = $_SESSION["currentUser"];
echo '<a href="logout.php">Logout</a>';
echo "  Welcome $currentUser1";
} else {
echo '<a href="login.php">LogIn</a>';
}


?>
</div>