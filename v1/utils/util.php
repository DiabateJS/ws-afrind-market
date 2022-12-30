<?php
class Util {

    function __construct(){
    }

    public static function getClassFromBoolean($bool){
        return $bool ? "green" : "red";
    }
}
?>