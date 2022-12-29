<?php
include_once "../utils/array.util.php";

$keys1 = array();
$tab1 = array();
$res5 = ArrayManager::arrayKeysExists($keys1, $tab1);
$isEmptyArrayRetrieveFalse = $res5 == false;

$keys2 = array("cle1");
$tab2 = array("key1" => "value1",
              "key2" => "value2");
$res6 = ArrayManager::arrayKeysExists($keys2, $tab2);
$isArrayKeysExistsCorrect1 = $res6 == false;

$keys3 = array("cle1","cle2");
$tab3 = array("cle1" => "valeur1",
              "cle2" => "valeur2");
$res7 = ArrayManager::arrayKeysExists($keys3, $tab3);
$isArrayKeysExistsCorrect2 = $res7;

?>