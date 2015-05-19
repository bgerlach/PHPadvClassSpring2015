<?php



class Validator {



    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }


    public function emailTypeIsValid($email) {
        return ( is_string($email) && !empty($email) );
    }
    

    public function activeIsValid($type) {
        return ( is_string($type) && preg_match("/^[0-1]$/", $type) );
    }

}
