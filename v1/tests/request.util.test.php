<?php
include_once "../utils/request.util.php";

function isGetRequestCorrect(){
    $EMPTY_REQUEST = array();

    $GET_REQUEST = array(
        "REQUEST_METHOD" => "GET"
    );

    $POST_REQUEST = array(
        "REQUEST_METHOD" => "POST"
    );

    $getRequestForEmpty = RequestManager::getRequestMethod($EMPTY_REQUEST);
    $getRequestForGet = RequestManager::getRequestMethod($GET_REQUEST);
    
    $getRequestForPost = RequestManager::getRequestMethod($POST_REQUEST);
    return $getRequestForEmpty == "" && $getRequestForGet == "GET"
                             && $getRequestForPost == "POST";
}

function isTableFromEmptyQueryStringCorrect(){
    $emptyQueryString = "";
    return is_array(RequestManager::queryStringToTable($emptyQueryString));
}

function isTableFromQueryString1Correct(){
    $queryStringWithOneKeyValue = "cle=valeur";
    $res = RequestManager::queryStringToTable($queryStringWithOneKeyValue);
    return is_array($res) && count($res) == 1 &&
            $res["cle"] == "valeur";
}

function isTableFromQueryString2Correct(){
    $queryStringWithManyKeysValues = "cle1=valeur1&cle2=valeur2";
    $res = RequestManager::queryStringToTable($queryStringWithManyKeysValues); 
    return is_array($res) && count($res) == 2 &&
            $res["cle1"] == "valeur1" &&
            $res["cle2"] == "valeur2";
}                                

function isQueryStringForEmptyRequestCorrect(){
    $EMPTY_REQUEST = array();
    $res = RequestManager::getQueryString($EMPTY_REQUEST);
    return $res == "";
}

function isQueryStringCorrect(){
    $QUERY_STRING_REQUEST = array(
        "QUERY_STRING" => "cle=valeur"
    );
    $res = RequestManager::getQueryString($QUERY_STRING_REQUEST);
    return is_string($res) && strlen($res) > 0 ;
}

?>