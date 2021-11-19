Produits
<?php


class Produits
{

    public $idPro;
    public $nomPro;

    function __construct($id){
        global $pdo;

        $reqUsers = $pdo->prepare('SELECT * FROM Produits WHERE Id = ?');
        $reqUsers->execute([$id]);
        $data = $reqUsers->fetch();

        $this->idPro = $id;
        $this->nomPro = $data['nomPro'];

    }

    //envoie de tous les Produits
    static function getAllProduits(){
        global $pdo;
        
        
        $reqUsers = $pdo->prepare('SELECT * FROM Produits');
        $reqUsers->execute([]);
        return $reqUsers->fetchAll();
    }

}