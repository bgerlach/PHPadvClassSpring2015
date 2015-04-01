<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
/* Start by creating the classes and files you need
*
*/
$util = new Util();
$validator = new Validator();
/*
* When dealing with forms always collect the data before trying to validate
*
* When getting values from $_POST or $_GET use filter_input
*/
$emailType = filter_input(INPUT_POST, 'emailtype');
// We use errors to add issues to notify the user
$errors = array();
/*
* We setup this config to get a standard database setup for the page
*/
$dbConfig = array(
"DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
"DB_USER"=>'root',
"DB_PASSWORD"=>''
);
$pdo = new DB($dbConfig);
$db = $pdo->getDB();
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
//save to to database.
$stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
$values = array(":emailtype"=>$emailType);
if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
echo 'Email Added';
}
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
$stmt = $db->prepare("SELECT * FROM emailtype where active = 1");
if ($stmt->execute() && $stmt->rowCount() > 0) {
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $value) {
echo '<p>', $value['emailtype'], '</p>';
}
} else {
echo '<p>No Data</p>';
}
?>
</strong>
</body>
