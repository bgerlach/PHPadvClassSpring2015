<?php

/**
 * Description of Validator
 *
 * @author GForti
 */

namespace API\models\services;

use API\models\interfaces\IService;

class Validator implements IService {
    
    
    
    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
    

    public function emailTypeIsValid($type) {
        return ( is_string($type) && preg_match("/^[a-zA-Z]+$/", $type) );
    }
    
    public function phoneIsValid($phone) {
        return ( preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone) );
    }
    

    public function phoneTypeIsValid($type) {
        return ( is_string($type) && preg_match("/^[a-zA-Z]+$/", $type) );
    }
    

    public function activeIsValid($type) {
        return ( is_string($type) && preg_match("/^[0-1]$/", $type) );
    }
}
