<?php
include_once "../models/articles.manager.php";
include_once "../article/logic.php";
include_once "../models/result.model.php";

$METHOD = getRequestMethod($_SERVER);
$result = null;

if ($METHOD == "GET"){
    $result = new Result();
    $result->data = $articles;
    echo json_encode($result);
}

?>