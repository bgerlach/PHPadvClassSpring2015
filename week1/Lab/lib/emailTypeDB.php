<?php


 class emailTypeDB {

    public function saveEmailType($emailType) {
    
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
         
 
    $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
    $values = array(":emailtype"=>$emailType);
    
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
    echo 'Email Type Added';
    return true;   
}
    return false;
}

    public function displayEmailType() {
    
        
        $dbConfig = array(
        "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
        "DB_USER"=>'root',
        "DB_PASSWORD"=>''
        );
        
            $pdo = new DB($dbConfig);
            $db = $pdo->getDB();
         
 
        $stmt = $db->prepare("SELECT * FROM emailtype where active = 1");
        if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $value) {
        echo '<p>', $value['emailtype'], '</p>';
        $stmt->closeCursor();
    }
}       else {
        echo '<p>No Data</p>';
        return false;
}
}
}





