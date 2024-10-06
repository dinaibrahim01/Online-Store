<?php
namespace classes\Validation;
require_once'ValidationInterface.php';

class Img implements ValidationInterface {

    public function validate($name, $value){

$ext= pathinfo($value,PATHINFO_EXTENSION);
$extension= ["png" , "jpg" , "jpeg" , "gif" ];

        if (!empty($value)&& !in_array($ext,$extension)) {
            return "$name not valid extension";
        }
        return false;
    }
}

?>