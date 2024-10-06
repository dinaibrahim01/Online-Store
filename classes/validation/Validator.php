<?php 

namespace classes\Validation;

use Error;

require_once 'Email.php';
require_once 'Img.php';
require_once 'Max.php';
require_once 'Numbers.php';
require_once 'Str.php';
require_once 'Required.php';

class Validator{

    public $errors = [];

    public function makeValidation($name , $value , $obj ){
            return $obj->validate($name , $value);
    }
     
    public function rules($name , $value , $rules){
       foreach ($rules as $rule){
         if ($rule == "email") {
            $error =$this->makeValidation($name , $value ,new Email);
         }elseif  ($rule =="img") {
            $error =$this->makeValidation($name , $value ,new Img);
         }elseif ($rule == "max:100") {
            $error =$this->makeValidation($name , $value ,new Max);
         }elseif ($rule == "number") {
            $error =$this->makeValidation($name , $value ,new Numbers);
         }elseif ($rule == "required") {
            $error =$this->makeValidation($name , $value ,new Required);
         }elseif ($rule == "string") {
            $error =$this->makeValidation($name , $value ,new Str);
         }else {
            $error = false ;
         }

         if ($error != false) {
            $this->errors[]=$error;
         }
         }
      }
}
?>