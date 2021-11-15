<?php

class Donner
{
    public $idDon;
    public $nomPro;

    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Donner WHERE idDon = ? ');
        $reqUsers->execute([$id,$nomprod]);
        $data = $reqUsers->fetch();

        $this->idDon = $id;
        $this->nomPro = $data['nomPro'];

    }

    //envoie de toutes les donations d'un donateur
    static function getDonation($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Donner WHERE idDon = ? ');
        $reqUsers->execute([$id]);
        return $reqUsers->fetchAll();

    }

}