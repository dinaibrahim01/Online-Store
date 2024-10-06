<?php
namespace classes\Validation;
require_once'ValidationInterface.php';
class Email implements ValidationInterface {
    
    public function validate($name, $value){

        if (!filter_var($value,FILTER_VALIDATE_EMAIL)) {
            return "$name not valid email address";
        }
        return false;
    }
}





?>