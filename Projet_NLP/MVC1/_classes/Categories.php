<?php

class Categories 
{
    public $idCate;
    public $nomCate;

    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Categories WHERE idCate = ?');
        $reqUsers->execute([$id]);
        $data = $reqUsers->fetch();

        $this->idCate = $id;
        $this->nomCate = $data['nomCate'];

    }

    //envoie de tous les utilisateurs
    static function getAllCategories(){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Categories');
        $reqUsers->execute([]);
        return $reqUsers->fetchAll();

    }

}