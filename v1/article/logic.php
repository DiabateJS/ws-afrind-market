<?php

function getRequestMethod($Server){
    if (array_key_exists("REQUEST_METHOD",$Server)){
        return $Server["REQUEST_METHOD"]; 
    }
    return "";
}

function queryStringToTable($queryString){
    $res = array();
    if (count($queryString) > 0){
        $tab1 = explode("&",$queryString);
        foreach($tab1 as $keyValue){
            $tab = explode("=",$keyValue);
            $res[$tab[0]]=$tab[1];
        }
    }
    return $res;
}

function getQueryString($request){
    $res = "";
    if (array_key_exists("QUERY_STRING",$request)){
        $res = $request["QUERY_STRING"];
    }
    return $res;
}

function arrayKeysExists($keys,$tab){
    $res = false;
    if (count($keys) > 0){
        $res = true;
        for ($i = 0 ; $i < count($keys) ; $i++){
            $res = $res && array_key_exists($keys[$i],$tab);
        }
    }
    return $res;
}

?>