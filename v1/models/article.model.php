<?php
class Article {
    public $id;
    public $libelle;
    public $qte;
    public $prix;
    public $img_link;
    public $commentaire;

    function __construct($lib, $qte, $prix, $img, $com)
    {
        $this->libelle = $lib;
        $this->qte = $qte;
        $this->prix = $prix;
        $this->img_link = $img;
        $this->commentaire = $com;
    }
}
?>