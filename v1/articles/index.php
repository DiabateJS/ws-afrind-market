<?php
include_once "../models/articles.manager.php";
include_once "../article/logic.php";
include_once "../models/result.model.php";
include_once "../utils/request.util.php";

$METHOD = RequestManager::getRequestMethod($_SERVER);
$result = null;
$articleManager = new ArticleManager();

if ($METHOD == "GET"){
    $result = new Result();
    $result->data = $articleManager->getArticles();
    echo json_encode($result);
}

?>