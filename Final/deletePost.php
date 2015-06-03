/
<?php

//require_once('class.DB.php');
//$forumid = $_POST['forumid'];


//delete forum post

        
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
            
        $forumid = filter_input(INPUT_GET, 'forumid');
            
$query = "DELETE FROM forum
          WHERE forumid = '$forumid'";
$db->exec($query);

// display the Product List page
//include('addForumPost.php');
?>
