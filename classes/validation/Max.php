<?php
namespace classes\Validation;
require_once'ValidationInterface.php';

class Max implements ValidationInterface {

    public function validate($name, $value){
        if (strlen($value)>100) {
            return "$name must be less than 100 chars";
        }
        return false;
    }
}



?>