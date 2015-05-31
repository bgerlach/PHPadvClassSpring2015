<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$errors = array();
$validator = new Validator();

session_start();


// Validate inputs
if (empty($username)) {
    $error = "Invalid name.  Please enter a valid username";
    echo $error;
} 
else if ((strlen($password) < 4))
{
    $error = "Invalid password.  Please enter a valid password over 4 characters in length";
    echo $error;
}

if ($validator->check_login($username, $password)== true)
{
    $_SESSION['loggedin']=true;
}
else
{
    $_SESSION['loggedin']=false;
    $errors[] = "Invalid Login.  Please reenter email and password.";
}
    
    if ($_SESSION['loggedin'] == true)
    {
      header('Location: addForumPost.php');
    }

    include('login.php');

?>
