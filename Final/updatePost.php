<!DOCTYPE html>
<html>
    
        <link rel="stylesheet" type="text/css" href="main.css"/>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php

$forumid = filter_input(INPUT_GET, 'forumid');
$db = new PDO('mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015', "root", "");


$dbs = $db->prepare('SELECT * FROM NFLForum WHERE forumid = :forumid');
$dbs->bindParam(':forumid', $forumid, PDO::PARAM_INT);

if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
$results = $dbs->fetch(PDO::FETCH_ASSOC);
?>
    
    <form action="updateForum_process.php" method="post">  
                <br />

                <input type="hidden" name="forumid" value="<?php echo $results['forumid']; ?>"/>
                <br />
                
                <label>Subject:</label>
                <input type="text" name="subject" value="<?php echo $results['subject']; ?>" />
                <br />

                <label>Userpost:</label>
                <input type="text" name="userpost" value="<?php echo $results['userpost']; ?>" />
                <br />
                
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $results['username']; ?>" />
                <br />
                
                <label>Logged:</label>
                <input type="text" name="logged" value="<?php echo $results['logged']; ?>" />
                <br />
                
                <input type="submit" value="Update Post" />
                <br />
            </form>
<?php
} else {
echo '<h1> user ', $forumid,' was <strong>NOT</strong> updated</h1>';
}



?>

</body>
</html>
