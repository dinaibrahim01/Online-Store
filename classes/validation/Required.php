<?php
namespace classes\Validation;
require_once'ValidationInterface.php';

class Required implements ValidationInterface {
    
    public function validate($name, $value){
        if (empty($value)) {
            return "$name is required";
        }
        return false;
    }
}





?>