<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<?php

    include_once 'Header.php';

    
$util = new Util();
$validator = new Validator();
$forumDB = new forumDB();
$usersDB = new usersDB();



$subject = filter_input(INPUT_POST, 'subject');
$userpost = filter_input(INPUT_POST, 'userpost');
$username = filter_input(INPUT_POST, 'username');
$currentUser1 = $_SESSION["currentUser"];
$errors = array();



if ( count($errors) > 0 ) {
foreach ($errors as $value) {
echo '<p>',$value,'</p>';
}
} else {

  
 

    
}
?>
<div id="content">
<h3>NFL Forum</h3>
<form action="#" method="post">
<label>Subject:</label>
<input type="text" size="40" name="subject" value="<?php echo $subject; ?>" placeholder="" />
<br>

                
<label>Comment:</label>
<textarea name="userpost" rows="10" cols="37"> <?php echo $userpost; ?></textarea>
<br>

<label>User:</label>
<input type="text" size="40" name="username" 
       value="<?php echo $currentUser1 ?>" placeholder="" />
                <br>                <br>                <br>
<input type="submit" value="Submit" />
</form>
</div>

<div id="forum">
    <br>
            <table border="1" cellpadding="5">
                <tr>
                    <th>Time</th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Comment</th>


                </tr>
                <br>
<?php
$forumDB->saveForum($subject,$userpost,$username);
$forumDB->displayForum();
?>
                            
</div>
</body>
