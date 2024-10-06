<?php
namespace classes\Validation;
require_once'ValidationInterface.php';

class Numbers implements ValidationInterface {

    public function validate($name, $value){
        if (!empty($value)&& !is_numeric($value)) {
            return "$name Must Be Number";
        }
        return false;
    }
}


?>