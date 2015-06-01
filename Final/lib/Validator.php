<?php
/**
* Validator Class
*
* A collection of functions used to validate data
*
* @author Gabriel Forti
*/
class Validator {
    
    
function check_login($username, $password)
{
    //$password = sha1($password);
    $db = new PDO("mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015", "root", "");
    $dbs = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $dbs->bindParam(':username', $username, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);

    if ( $dbs->execute() && $dbs->rowCount() > 0 )
    {
        return true;
    }
    else
    {
        return false;
    }
}

function check_email($email)
{
    
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    $dbs = $db->prepare('SELECT * FROM signup WHERE email = :email');
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);

    if ( $dbs->execute() && $dbs->rowCount() > 0 )
    {
        return true;
    }
    else
    {
        return false;
    }
}
}