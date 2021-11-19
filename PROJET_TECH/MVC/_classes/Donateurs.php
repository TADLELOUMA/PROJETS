<?php


class Donateurs
{

    public $idDon;
    public $nomDo;

    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Donateurs WHERE idCate = ?');
        $reqUsers->execute([$id]);
        $data = $reqUsers->fetch();

        $this->ididDon = $id;
        $this->nomDo = $data['nomDo'];

    }

    //envoie de tous les Donateurs
    static function getAllDonor(){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Donateurs');
        $reqUsers->execute([]);
        return $reqUsers->fetchAll();

    }

}