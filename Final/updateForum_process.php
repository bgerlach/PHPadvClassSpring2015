<?php
// Get the user data

$forumid = $_POST['forumid'];
$subject = $_POST['subject'];
$userpost = $_POST['userpost'];
$username = $_POST['username'];
$logged = $_POST['logged'];


$db = new PDO('mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015', "root", "");
$dbs = $db->prepare('UPDATE NFlforum SET subject = :subject, userpost = :userpost, username = :username, logged = :logged WHERE forumid = :forumid');

$dbs->bindParam(':forumid', $forumid, PDO::PARAM_INT);
$dbs->bindParam(':subject', $subject, PDO::PARAM_STR);
$dbs->bindParam(':userpost', $userpost, PDO::PARAM_STR);
$dbs->bindParam(':username', $username, PDO::PARAM_STR);
$dbs->bindParam(':logged', $logged, PDO::PARAM_STR);

if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
echo '<h1> Post ', $forumid,' was updated</h1>';
} else {
echo '<h1> Post ', $forumid,' was <strong>NOT</strong> updated</h1>';
}
    
include('addForumPost.php');

?>

