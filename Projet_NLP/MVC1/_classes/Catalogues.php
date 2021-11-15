<?php

class Catalogues 
{
    public $idCata;
    public $nomCata;


    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Catalogue WHERE idCata = ?');
        $reqUsers->execute([$id]);
        $data = $reqUsers->fetch();

        $this->idCata = $id;
        $this->nomCata = $data['nomCata'];

    }

    //envoie de tous les Catalogues
    static function getAllCatalogues(){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Catalogue');
        $reqUsers->execute([]);
        return $reqUsers->fetchAll();

    }


}