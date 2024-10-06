<?php

class Str{
    public static function limit($Str){
        if(strlen($Str)>20 ){
            return substr($Str , 0 , 20). ". . . . .";
        }

        return $Str;
    }
}


?>