<?php 
include_once "article.model.php";

class ArticleManager {

    private $articles;

    function __construct()
    {
        $this->articles = array();

        $article1 = new Article("tunique homme", 10, 10000, "", "");
        $article1->id = 1;
        $this->articles[] = $article1;

        $article2 = new Article("tunique femme", 25, 15000, "", "");
        $article2->id = 2;
        $this->articles[] = $article2;

        $article3 = new Article("body homme", 15, 5000, "", "");
        $article3->id = 3;
        $this->articles[] = $article3;

        $article4 = new Article("body femme", 8, 4500, "", "");
        $article4->id = 4;
        $this->articles[] = $article4;

        $article5 = new Article("string femme", 35, 3000, "", "");
        $article5->id = 5;
        $this->articles[] = $article5;   
    }

    public function getArticles(){
        return $this->articles;
    }

    public function add($article){
        $this->articles[] = $article;
    }

    public function find($id){
        $res = null;
        for ($i = 0 ; $i < count($this->articles) ; $i++){
            if ($this->articles[$i]->id == $id){
                $res = $this->articles[$i];
            }
        }
        return $res;
    }

    public function update($id, $article){
        for ($i = 0 ; $i < count($this->articles) ; $i++){
            if ($this->articles[$i]->id == $id){
                $this->articles[$i] = $article;
            }
        }
    }

    public function delete($id){
        $indice = -1;
        for ($i = 0 ; $i < count($this->articles) ; $i++){
            if ($this->articles[$i]->id == $id){
                $indice = $i;
            }
        }
        if ($indice != -1){
            unset($this->articles[$indice]);
        }
    }
}


?>