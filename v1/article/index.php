<?php
include_once "../models/article.php";
include_once "../models/articles.manager.php";
include_once "../models/result.model.php";
include_once "../utils/request.util.php";
include_once "../utils/array.util.php";

$METHOD = RequestManager::getRequestMethod($_SERVER); 
$QUERY_STRING = RequestManager::getQueryString($_SERVER);
$TAB_PARAMS = RequestManager::queryStringToTable($QUERY_STRING);

$result = null;
$articleManager = new ArticleManager();

if ($METHOD == "GET" && count($TAB_PARAMS) == 1 && array_key_exists("id",$TAB_PARAMS)){
    $id = $TAB_PARAMS["id"];
    $article_recherche = $articleManager->find($id);
    $result = new Result();
    if ($article_recherche != null){
        $result->data = $article_recherche;
    }else{
        $articleManager->delete($article_recherche);
        $result->data = $articleManager->getArticles();
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
    $articleManager->add($article_new);
    $result = new Result();
    $result->data = $articleManager->getArticles();
    echo json_encode($result);
}

$ARTICLE_FIELDS = array("libelle","qte","prix","img_link","commentaire");
if ($METHOD == "GET" && count($TAB_PARAMS) > 1 && ArrayManager::arrayKeysExists($ARTICLE_FIELDS, $TAB_PARAMS)){
    $id = $TAB_PARAMS["id"];
    $lib = $TAB_PARAMS["libelle"];
    $qte = $TAB_PARAMS["qte"];
    $prix = $TAB_PARAMS["prix"];
    $img = $TAB_PARAMS["img_link"];
    $com = $TAB_PARAMS["commentaire"];
    $article = $articleManager->find($id);
    if ($article == null){
        $article_new = new Article($lib,$qte,$prix,$img,$com);
        $article_new->id = $id;
        $articleManager->add($article_new);
    }else{
        $articleManager->update($id, $article);
    }
    $result = new Result();
    $result->data = $articleManager->getArticles();
    echo json_encode($result);
}

if ($METHOD == "PUT"){
    $id = $TAB_PARAMS["id"];
    $lib = $TAB_PARAMS["libelle"];
    $qte = $TAB_PARAMS["qte"];
    $prix = $TAB_PARAMS["prix"];
    $img = $TAB_PARAMS["img_link"];
    $com = $TAB_PARAMS["commentaire"];

    $article = new Article($lib,$qte,$prix,$img,$com);
    $article->id = $id;
    $articleManager->update($id, $article);
    $result = new Result();
    $result->data = $articleManager->getArticles();
    echo json_encode($result);
}

if ($METHOD == "DELETE"){
    $id = $TAB_PARAMS["id"];
    $articleManager->delete($id);
    $result = new Result();
    $result->data = $articleManager->getArticles();
    echo json_encode($result);
}

?>