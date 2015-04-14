<?php


 class emailTypeDB {

    public function saveEmailType($emailType) {
     $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
    $values = array(":emailtype"=>$emailType);
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
    echo 'Email Type Added';
    return $stmt;
}
}
}