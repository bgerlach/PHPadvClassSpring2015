
<?php
//delete from NFLforum where forumid = forumid

        $forumid = filter_input(INPUT_GET, 'forumid');

$db = new PDO('mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015', "root", "");
$dbs = $db->prepare('DELETE from NFLforum where forumid = :forumid');
$dbs->bindParam(':forumid', $forumid, PDO::PARAM_INT);
if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
echo '<h1> Post ', $forumid,' was deleted</h1>';
} else {
echo '<h1> Post ', $forumid,' was <strong>NOT</strong> deleted</h1>';
}

include('addForumPost.php');
?>
