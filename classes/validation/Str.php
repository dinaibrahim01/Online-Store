<?php
namespace classes\Validation;
require_once'ValidationInterface.php';

class Str implements ValidationInterface {
    
    public function validate($name, $value){
        if (is_numeric($value)) {
            return "$name must be text";
        }
        return false;
    }
}


?>