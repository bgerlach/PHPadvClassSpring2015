<?php

//usersDB class
 class usersDB {

    //function to save new users on signup
     public function saveUsers($user) {
    
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
         
 
    $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
    $values = array(":emailtype"=>$forum);
    
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
    echo 'Post Added';
    return true;   
}
    return false;
}

//displays current users
    public function displayUsers() {

                $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
                $stmt = $db->prepare("SELECT * FROM forum");
        if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $value) {
        echo '<tr><td>', $value['logged'];
        echo '<td>', $value['username'];
        echo '<td>', $value['subject'], '</p>';
        echo '<td>', $value['userpost'], '</p>';
       // echo '<td><a href=updateEmail.php?emailid=',$value->getEmailid(),'>Update</a></td>';
        //echo '<td><a href=deleteEmail.php?emailid=',$value->getEmailid(),'>Delete</a></td></tr>';
        $stmt->closeCursor();
    }
}       else {
        echo '<p>No Data</p>';
        return false;
}
}

//returns the users by id
    public function getById($userID) {
         
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
         
         $stmt = $db->prepare("SELECT * FROM emailtype WHERE emailtypeid = :emailtypeid");
         
         if ( $stmt->execute(array(':emailtypeid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->map($results);            
         }
         
         return $model;
    }
    
    //displays the username
        public function displayUserName() {

                $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
                $stmt = $db->prepare("SELECT * FROM users");
        if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $value) {
        echo $value['username'];
        $stmt->closeCursor();
    }
}       else {
        echo '<p>No Data</p>';
        return false;
}
}
    
       

}