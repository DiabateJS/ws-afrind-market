<?php
include_once "logic.php";
include_once "../models/article.php";
include_once "../models/articles.manager.php";
include_once "../models/result.model.php";

$METHOD = getRequestMethod($_SERVER); 
$QUERY_STRING = getQueryString($_SERVER);
$TAB_PARAMS = queryStringToTable($QUERY_STRING);

$result = null;

if ($METHOD == "GET" && count($TAB_PARAMS) == 1 && array_key_exists("id",$TAB_PARAMS)){
    $id = $TAB_PARAMS["id"];
    $article_recherche = null;
    $result = new Result();
    for ($i = 0 ; $i < count($articles) ; $i++){
        if ($articles[$i]->id == $id){
            $article_recherche = $articles[$i];
        }
    }
    if ($article_recherche != null){
        $result->data = $article_recherche;
    }
    echo json_encode($result);
}

if ($METHOD == "POST"){
    $id = $TAB_PARAMS["id"];
    $lib = $TAB_PARAMS["libelle"];
    $qte = $TAB_PARAMS["qte"];
    $prix = $TAB_PARAMS["prix"];
    $img = $TAB_PARAMS["img_link"];
    $com = $TAB_PARAMS["commentaire"];

    $article_new = new Article($lib,$qte,$prix,$img,$com);
    $article_new->id = $id;
    $articles[] = $article_new;
    $result = new Result();
    $result->data = $articles;
    echo json_encode($result);
}

if ($METHOD == "GET" && count($TAB_PARAMS) > 1 && 
        array_key_exists("libelle",$TAB_PARAMS) &&
        array_key_exists("qte",$TAB_PARAMS) && 
        array_key_exists("prix",$TAB_PARAMS) &&
        array_key_exists("img_link",$TAB_PARAMS) &&
        array_key_exists("commentaire",$TAB_PARAMS)){
    $id = $TAB_PARAMS["id"];
    $lib = $TAB_PARAMS["libelle"];
    $qte = $TAB_PARAMS["qte"];
    $prix = $TAB_PARAMS["prix"];
    $img = $TAB_PARAMS["img_link"];
    $com = $TAB_PARAMS["commentaire"];
    $article_new = new Article($lib,$qte,$prix,$img,$com);
    $article_new->id = $id;
    $articles[] = $article_new;
    $result = new Result();
    $result->data = $articles;
    echo json_encode($result);
}

?>