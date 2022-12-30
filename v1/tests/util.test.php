<?php
include_once "tests.interface.php";
include_once "../utils/util.php";

class UtilTest implements Test {

    function __construct(){
    }

    public function isGetClassFromBooleanCorrect(){

        $isRed = Util::getClassFromBoolean(false);
        $isGreen = Util::getClassFromBoolean(true);

        return $isRed == "red" && $isGreen == "green";
    }

    public function displayTests()
    {
        $code="<h3>Test Util</h3>";
        $code.="<table border=1>";
        $code.="<thead>";
        $code.="<tr><th>Test Description</th><th>Resultat</th></tr>";
        $code.="</thead>";
        $code.="<tbody>";
        $code.="<tr>";
        $code.="<td>Should getClassFromBoolean retrieve correct values</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isGetClassFromBooleanCorrect())."></td>";
        $code.="</tr>";
        $code.="</tbody>";
        $code.="</table>";
        return $code;
    }
}

?>