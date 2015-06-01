<?php


 class forumDB {

    public function saveForum($subject, $userpost, $username) {
    
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
         
 
    $stmt = $db->prepare("INSERT INTO NFLforum SET subject = :subject, userpost = :userpost, username = :username, logged = now()");
    $values = array(":subject"=>$subject, ":userpost" =>$userpost, ":username" => $username);
    
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
    return true;   
}
    return false;
}

    public function displayForum() {

        ?>

                
        <?php
                $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
                $stmt = $db->prepare("SELECT * FROM NFLforum");
        if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $value) {
        echo '<tr><td>', $value['logged'];
        echo '<td>', $value['username'];
        echo '<td>', $value['subject'], '</p>';
        echo '<td>', $value['userpost'], '</p>';
       // echo '<td><a href=updateEmail.php?emailid=',$value->getEmailid(),'>Update</a></td>';
        //echo '<td><a href=delete_post.php?forumid=',$value['forumid'],'>Delete</a></td></tr>';
        $stmt->closeCursor();
    }
}       else {
        echo '<p>No Data</p>';
        return false;
}
}
}





