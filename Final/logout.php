<?php

include './Header.php';
unset($_SESSION['loggedin']); 
//session_destroy();

header('Location: login.php');


?>
