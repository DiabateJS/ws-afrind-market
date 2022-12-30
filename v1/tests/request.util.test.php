<?php
include_once "tests.interface.php";
include_once "../utils/util.php";
include_once "../utils/request.util.php";

class RequestUtilTest implements Test {

    function __construct()
    {
    }
    
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

    public function displayTests()
    {
        $code="<h3>Test Request Manager</h3>";
        $code.="<table border=1>";
        $code.="<thead>";
        $code.="<tr><th>Test Description</th><th>Resultat</th></tr>";
        $code.="</thead>";
        $code.="<tbody>";
        $code.="<tr>";
        $code.="<td>Should Get Request Method is correct</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isGetRequestCorrect()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="<tr>";
        $code.="<td>Should table retrieve by empty query string is empty</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isTableFromEmptyQueryStringCorrect()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="<tr>";
        $code.="<td>Should table retrieve by query string 'cle=valeur' is correct</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isTableFromQueryString1Correct()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="<tr>";
        $code.="<td>Should table retrieve by query string 'cle1=valeur1&cle2=valeur2' is correct</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isTableFromQueryString2Correct()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="<tr>";
        $code.="<td>Should getQueryString for empty request is empty</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isQueryStringForEmptyRequestCorrect()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="<tr>";
        $code.="<td>Should getQueryString is correct</td>";
        $code.="<td class=".Util::getClassFromBoolean($this->isQueryStringCorrect()).">";
        $code.="</td>";
        $code.="</tr>";
        $code.="</tbody>";
        $code.="</table>";
        return $code;
    }
}

?>