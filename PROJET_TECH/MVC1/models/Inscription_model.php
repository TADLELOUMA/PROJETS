<?php

require_once('../_functions/functions.php');

class Inscription_model
{
    //private $idUsers;
    private $username;
    private $adresse_email;
    private $Pass_word;
    private $passwrd_confirmed;
    private $passhass;
    private $code;

    function __construct($username,$adresse_email,$password,$passwrd_confirmed){
        global $pdo;

        $this->username = $username;
        $this->adresse_email = $adresse_email;
        $this->Pass_word = $password;
        $this->passwrd_confirmed = $passwrd_confirmed;
        $this->passhass = password_hash($this->Pass_word, PASSWORD_DEFAULT);
        $this->code = uniqid(rand());
    }

  public function ajouter_membre_dans_bdd()
  {
    global $pdo;



    try
    {
      $requete = $pdo->prepare('INSERT INTO Users(username,adresse_mail,mot_de_pass,code) VALUES (:username,:adresse_email,:passhass,:code)');
      $result =$requete->execute(array(
        'username' => $this->username,
        'adresse_email' => $this->adresse_email,
        'passhass' => $this->passhass,
        'code'=> $this->code
      ));
      if($result){
        return $pdo->lastInsertId();
      }
      return $requete->errorInfo();
    }
    catch (PDOException $e){
      echo "ajout invalide".$e->getMessage($username);
    }

  }
  public function session(){

    global $pdo;
    try{

      $requete = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
      $requete->execute(array(
        'username' => $this->username));
      $result = $requete->fetch();
      $_SESSION['idUsers'] = $result['idUsers'];
      $_SESSION['username'] = $this->username;
      $_SESSION['adresse_mail']  = $result['adresse_mail'];
      $_SESSION['code'] = $result['code'];
      
    }catch(PDOException $e)
    {
      echo "enregistrement de la session du".$e->getMessage($username);
    }

  }

  public function valider_compte_avec_code($code) {

    global $pdo ;

    $requete = $pdo->prepare('UPDATE Users SET
      code = "1"
      WHERE
      code = "0"');

    $requete->bindValue(':code', $code);

    $requete->execute();

    return ($requete->rowCount() == 1);
  }



}
