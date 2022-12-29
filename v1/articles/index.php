<?php
include_once "../models/articles.manager.php";
include_once "../article/logic.php";
include_once "../models/result.model.php";
include_once "../utils/request.util.php";

$METHOD = RequestManager::getRequestMethod($_SERVER);
$result = null;

if ($METHOD == "GET"){
    $result = new Result();
    $result->data = $articles;
    echo json_encode($result);
}

?>