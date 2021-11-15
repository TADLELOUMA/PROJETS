<?php


class Inscription_model
{
    //private $idUsers;
    private $username;
    private $adresse_email;
    private $Pass_word;
    private $passwrd_confirmed;
    private $passhass;

    function __construct($username,$adresse_email,$password,$passwrd_confirmed){
        global $pdo;

        $this->username = $username;
        $this->adresse_email = $adresse_email;
        $this->Pass_word = $password;
        $this->passwrd_confirmed = $passwrd_confirmed;
        $this->passhass = password_hash($this->Pass_word, PASSWORD_DEFAULT);

    }
    /*public function getidUsers()
    {
      global $pdo;
      return $this->idUsers;
    }*/

    public function existsMail($adresse_email)
    {
      global $pdo;

      $req = $pdo->prepare("SELECT * FROM Users WHERE adresse_email= ?");
      $req->execute(array($adresse_email));
      return $req->rowCount()>0;

    }
    
    public function ajouter_membre_dans_bdd()
    {
      global $pdo;

      try
      {

        $req = $pdo->prepare('INSERT INTO Users(username,adresse_email,mot_de_pass) VALUES (:username,:adresse_email,:passhass)');
        $req->execute(array(
          'username' => $this->username,
          'adresse_email' => $this->adresse_email,
          'passhass' => $this->passhass
        ));
        echo "ajout reussi"."<br />";

        /*echo getId;*/
      }
      catch (PDOException $e){
          echo "ajout invalide".$e->getMessage();
      }

    }

}