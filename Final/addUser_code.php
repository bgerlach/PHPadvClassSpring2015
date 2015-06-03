<?php
// Get user data
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');


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
else{
   // $password = sha1($password);
   
    //add new user below
    $db = new PDO("mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015", "root", "");
    $dbs = $db->prepare('INSERT into users set username = :username, password = :password');
    $dbs->bindParam(':username', $username, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);

    if ( $dbs->execute() && $dbs->rowCount() > 0 )
    {
        session_start();
    $_SESSION['currentUser']=$username;
    $_SESSION['loggedin']=true;
    header('Location: addForumPost.php');
    
    }
    else
    {
        echo "Sign Up Incomplete";
        var_dump($db->errorInfo());
    }
}