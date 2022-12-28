<?php 
include_once "article.model.php";

$articles = array();

$article1 = new Article("tunique homme", 10, 10000, "", "");
$article1->id = 1;
$articles[] = $article1;

$article2 = new Article("tunique femme", 25, 15000, "", "");
$article2->id = 2;
$articles[] = $article2;

$article3 = new Article("body homme", 15, 5000, "", "");
$article3->id = 3;
$articles[] = $article3;

$article4 = new Article("body femme", 8, 4500, "", "");
$article4->id = 4;
$articles[] = $article4;

$article5 = new Article("string femme", 35, 3000, "", "");
$article5->id = 5;
$articles[] = $article5;

?>