<?php
include_once "../utils/array.util.php";

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

?>