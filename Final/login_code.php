

<?php


//check if user exists in users databse and login if user exists
include './bootstrap.php';

    
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$errors = array();


$validator = new Validator();


session_start();


if ($validator->check_login($username, $password)== true)
{
    $_SESSION['currentUser']=$username;
    $_SESSION['loggedin']=true;

}
else
{
    $_SESSION['loggedin']=false;
    $errors[] = "Invalid Login.  Please reenter email and password.";
          header('Location: login.php');

}
    
    if ($_SESSION['loggedin'] == true)
    {
      header('Location: addForumPost.php');
    }

    include('login.php');

?>
