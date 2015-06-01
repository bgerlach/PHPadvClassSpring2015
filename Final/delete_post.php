<?php

$forumid = $_POST['forumid'];

        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
            
$query = "DELETE FROM forum
          WHERE forumid = '$forumid'";
$db->exec($query);

// display the Product List page
include('addForumPost.php');
?>