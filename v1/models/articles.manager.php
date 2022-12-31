<?php 
include_once "article.model.php";
include_once "bd.manager.php";

class ArticleManager {

    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();   
    }

    public function getArticles(){
        $sql = "select id, libelle, qte, prix, img_link, commentaire from article";
        $entete = array("id", "libelle", "qte", "prix", "img_link", "commentaire");
        $res = $this->bdManager->executeSelect($sql, $entete);
        return $res;
    }

    public function add($article){
        $sql = "insert into article(libelle, qte, prix, img_link, commentaire) value (:libelle, :qte, :prix, :img_link, :commentaire)";
        $dico = array("libelle" => $article->libelle, 
                      "qte" => $article->qte, 
                      "prix" => $article->prix, 
                      "img_link" => $article->img_link, 
                      "commentaire" => $article->commentaire);
        $res = $this->bdManager->executePreparedQuery($sql, $dico);
        return $res;
    }

    public function find($id){
        $sql = "select id, libelle, qte, prix, img_link, commentaire from article where id = :id";
        $dico = array("id" => $id);
        $entete = array("id", "libelle", "qte", "prix", "img_link", "commentaire");
        $res = $this->bdManager->executePreparedSelect($sql, $dico, $entete);
        return $res;
    }

    public function update($id, $article){
        $sql="update article set libelle = :libelle, qte = :qte, prix = :prix, img_link = :img_link, commentaire = :commentaire where id = :id";
        $dico = array("libelle" => $article->libelle, 
                      "qte" => $article->qte, 
                      "prix" => $article->prix, 
                      "img_link" => $article->img_link, 
                      "commentaire" => $article->commentaire,
                      "id" => $id);
        $res = $this->bdManager->executePreparedQuery($sql, $dico);
        return $res;
    }

    public function delete($id){
        $sql = "delete from article where id = :id";
        $dico = array("id" => $id);
        $res = $this->bdManager->executePreparedQuery($sql, $dico);
        return $res;
    }
}


?>