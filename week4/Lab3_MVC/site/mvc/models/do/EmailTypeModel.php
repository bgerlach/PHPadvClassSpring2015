<?php

namespace App\models\services;

//EmailTypeModel class with getters and setters

class EmailTypeModel extends BaseModel {
    
    private $emailtypeid;
    private $emailtype;
    private $active;
    
    function getEmailtypeid() {
        return $this->emailtypeid;
    }

    function getEmailtype() {
        return $this->emailtype;
    }

    function getActive() {
        return $this->active;
    }

    function setEmailtypeid($emailtypeid) {
        $this->emailtypeid = $emailtypeid;
    }

    function setEmailtype($emailtype) {
        $this->emailtype = $emailtype;
    }

    function setActive($active) {
        $this->active = $active;
    }


}
