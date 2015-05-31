<a href="Admin.php">Home</a>
<a href="signup.php">SignUp</a>

<?php
session_start();
if ( !empty($_SESSION['loggedin']) ) {
echo '<a href="logout.php">Logout</a>';
} else {
echo '<a href="login.php">LogIn</a>';
}
?>
