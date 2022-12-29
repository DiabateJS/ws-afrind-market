<?php
include_once "../utils/request.util.php";
include_once "../utils/array.util.php";

$EMPTY_REQUEST = array();
$getRequestForEmpty = RequestManager::getRequestMethod($EMPTY_REQUEST);
$GET_REQUEST = array(
    "REQUEST_METHOD" => "GET"
);
$getRequestForGet = RequestManager::getRequestMethod($GET_REQUEST);
$POST_REQUEST = array(
    "REQUEST_METHOD" => "POST"
);
$getRequestForPost = RequestManager::getRequestMethod($POST_REQUEST);
$isGetRequestCorrect = $getRequestForEmpty == "" && $getRequestForGet == "GET"
                         && $getRequestForPost == "POST";

$emptyQueryString = "";
$isTableFromEmptyQueryStringCorrect = is_array(RequestManager::queryStringToTable($emptyQueryString));

$queryStringWithOneKeyValue = "cle=valeur";
$res1 = RequestManager::queryStringToTable($queryStringWithOneKeyValue);
$isTableFromQueryString1Correct = is_array($res1) && count($res1) == 1 &&
                                  $res1["cle"] == "valeur";

$queryStringWithManyKeysValues = "cle1=valeur1&cle2=valeur2";
$res2 = RequestManager::queryStringToTable($queryStringWithManyKeysValues); 
$isTableFromQueryString2Correct = is_array($res2) && count($res2) == 2 &&
                                  $res2["cle1"] == "valeur1" &&
                                  $res2["cle2"] == "valeur2";                                

$res3 = RequestManager::getQueryString($EMPTY_REQUEST);
$isQueryStringForEmptyRequestCorrect = $res3 == "";

$QUERY_STRING_REQUEST = array(
    "QUERY_STRING" => "cle=valeur"
);
$res4 = RequestManager::getQueryString($QUERY_STRING_REQUEST);
$isQueryStringCorrect = is_string($res4) && strlen($res4) > 0 ;

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