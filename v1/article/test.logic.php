<?php
include_once "logic.php";

$EMPTY_REQUEST = array(
);
$getRequestForEmpty = getRequestMethod($EMPTY_REQUEST);
$GET_REQUEST = array(
    "REQUEST_METHOD" => "GET"
);
$getRequestForGet = getRequestMethod($GET_REQUEST);
$POST_REQUEST = array(
    "REQUEST_METHOD" => "POST"
);
$getRequestForPost = getRequestMethod($POST_REQUEST);
$isGetRequestCorrect = $getRequestForEmpty == "" && $getRequestForGet == "GET"
                         && $getRequestForPost == "POST";

$emptyQueryString = "";
$isTableFromEmptyQueryStringCorrect = is_array(queryStringToTable($emptyQueryString));

$queryStringWithOneKeyValue = "cle=valeur";
$res1 = queryStringToTable($queryStringWithOneKeyValue);
$isTableFromQueryString1Correct = is_array($res1) && count($res1) == 1 &&
                                  $res1["cle"] == "valeur";

$queryStringWithManyKeysValues = "cle1=valeur1&cle2=valeur2";
$res2 = queryStringToTable($queryStringWithManyKeysValues); 
$isTableFromQueryString2Correct = is_array($res2) && count($res2) == 2 &&
                                  $res2["cle1"] == "valeur1" &&
                                  $res2["cle2"] == "valeur2";                                

$res3 = getQueryString($EMPTY_REQUEST);
$isQueryStringForEmptyRequestCorrect = $res3 == "";

$QUERY_STRING_REQUEST = array(
    "QUERY_STRING" => "cle=valeur"
);
$res4 = getQueryString($QUERY_STRING_REQUEST);
$isQueryStringCorrect = is_string($res4) && strlen($res4) > 0 ;

?>