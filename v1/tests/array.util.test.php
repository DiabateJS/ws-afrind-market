<?php
include_once "tests.interface.php";
include_once "../utils/util.php";
include_once "../utils/array.util.php";

class ArrayUtilTest implements Test {

    function __construct(){
    }

    function isEmptyArrayRetrieveFalse(){
        $keys = array();
        $tab = array();
        $res = ArrayManager::arrayKeysExists($keys, $tab);
        return $res == false;
    }
    
    function isArrayKeysExistsCorrect1(){
        $keys = array("cle1");
        $tab = array("key1" => "value1",
                      "key2" => "value2");
        $res = ArrayManager::arrayKeysExists($keys, $tab);
        return $res == false;
    }
    
    function isArrayKeysExistsCorrect2(){
        $keys = array("cle1","cle2");
        $tab = array("cle1" => "valeur1",
                      "cle2" => "valeur2");
        $res = ArrayManager::arrayKeysExists($keys, $tab);
        return $res;
    }

    public function displayTests(){
        $code = "<h3>Test Array Manager</h3>";
        $code .= "<table border=1>";
        $code .= "<thead>";
        $code .="<tr><th>Test Description</th><th>Resultat</th></tr>";
        $code .="</thead>";
        $code .="<tbody>";
        $code .="<tr>";
        $code .="<td>Should arrayKeysExists retrieve false for empty keys array</td>";
        $code .="<td class=".Util::getClassFromBoolean($this->isEmptyArrayRetrieveFalse())."></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should arrayKeysExists retrieve false for array not contains keys value</td>";
        $code .="<td class=".Util::getClassFromBoolean($this->isArrayKeysExistsCorrect1())."></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should arrayKeysExists retrieve true for array contains all keys value</td>";
        $code .="<td class=".Util::getClassFromBoolean($this->isArrayKeysExistsCorrect2())."></td>";
        $code .="</tr>";
        $code .="</tbody>";
        $code .="</table>";
        return $code;
    }
} 

?>