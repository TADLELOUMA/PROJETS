<?php


include_once '_Catalogues.php';
include_once '_Produits.php';

class Contenir 
{

    public $idCata;
    public $nomPro;


    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Contenir WHERE idCata = ? ');
        $reqUsers->execute([$id]);
        $data = $reqUsers->fetch();

        $this->idCata = $id;
        $this->nomPro = $data['nomPro'];

    }
    
    //envoie de tous du contenu d'un catalogue
    static function getAllCatalogueContent($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Contenir WHERE idCata = ? ');
        $reqUsers->execute([$id]);
        return $reqUsers->fetchAll();

    }

}