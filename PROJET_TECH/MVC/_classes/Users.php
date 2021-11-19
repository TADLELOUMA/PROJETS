<?

class Users
{
    //public $id;
    private $username;
    private $email;
    private $Pass_word;
    private $passwrd_confirmed;
    private $passhass;

    function __construct($username,$email,$password,$passwrd_confirmed){
        global $pdo;

        $this->username = $username;
        $this->email = $email;
        $this->Pass_word = $password;
        $this->passwrd_confirmed = $passwrd_confirmed;
        $this->passhass = password_hash($this->Pass_word, PASSWORD_DEFAULT);

    }

    public function existsMail($email)
    {
      global $pdo;

      $req = $pdo->prepare("SELECT * FROM Users WHERE Email= ?");
      $req->execute(array($email));
      return $req->rowCount()>0;

    }
    public function verificationUsers()
    {
      if(existsMail($this->email))
        return "adresse mail exists deja";

      if(strlen($this->email) == 0 AND strlen($this->email) < 8)
        return "Veuiller choisir au moins 8 caractere";

      if(!isset($this->username))
        return "VEUILLER RENSEIGNER UN Username VALIDE";

      if(!isset($this->email))
        return "VEUILLER RENSEIGNER UNE ADRESSE MAIL VALIDE";

      if(!isset($this->Pass_word))
        return "VEUILLER RENSEIGNER UN password VALIDE";

      if(!isset($this->passwrd_confirmed))
        return "VEUILLER RENSEIGNER UN password VALIDE";

      return "verification ok";
    }

    public function insertionBdd()
    {
      global $pdo;

      try
      {

        $req = $pdo->prepare('INSERT INTO Users(Username,Email,Pass_word) VALUES (:username,:email,:passhass)');
        $req->execute(array(
          'Username' => $this->username,
          'Email' => $this->email,
          'passhass' => $this->passhass
        ));
        echo "ajout reussi"."<br />";
        
        return true;
      }
      catch (PDOException $e){
          echo "ajout invalide".$e->getMessage();
      }
      return false;

    }

    //envoie de tous les utilisateurs
    static function getAllUsers(){
        global $pdo;


        $reqUsers = $pdo->prepare('SELECT * FROM Users');
        $reqUsers->execute([]);
        return $reqUsers->fetchAll();
    }

}