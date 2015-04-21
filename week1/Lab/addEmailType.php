<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php

$util = new Util();
$validator = new Validator();
$emailTypeDB = new emailTypeDB();

$emailType = filter_input(INPUT_POST, 'emailtype');

$errors = array();


if ( $util->isPostRequest() ) {
if ( !$validator->emailTypeIsValid($emailType) ) {
$errors[] = 'Email type is not valid';
}
}
if ( count($errors) > 0 ) {
foreach ($errors as $value) {
echo '<p>',$value,'</p>';
}
} else {

 //insert email type via saveEmailType function in emailTypeDB class   
$addFunction = "saveEmailType";
$emailTypeDB->$addFunction($emailType);
    

}
?>
<h3>Add email type</h3>
<form action="#" method="post">
<label>Email Type:</label>
<input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
<input type="submit" value="Submit" />
</form>

<strong>
<?php
//display function 
$displayFunction = "displayEmailType";
$emailTypeDB->$displayFunction();

?>
</strong>
</body>
