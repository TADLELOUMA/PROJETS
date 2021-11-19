<?
class Connexion_model
{

    private $username;
    private $mot_de_pass;

    function __construct($username,$mot_de_pass){
        global $pdo;

        $this->username = $username;
        $this->mot_de_pass = $mot_de_pass;

    }

	public function combinaison_connexion_valide($username, $mot_de_pass) {
		global $pdo;

		$requete = $pdo->prepare("SELECT * FROM Users
			WHERE
			username  = :username" );
			$requete->execute(array(
			'username' => $username));
			$result = $requete->fetch();

		if ($result) {
			if(password_verify($mot_de_pass,$result['mot_de_pass']) AND ($result['verif'] == 1)){

				return $result['idUsers'];
			}
			if($result['verif'] == 0)
			{
				return $result['username'];
			}
			else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function lire_infos_utilisateur($idUsers) {

  		global $pdo;

  		$requete = $pdo->prepare("SELECT *
    		FROM Users
    		WHERE
    		idUsers = :idUsers");

  		$requete->bindValue(':idUsers', $idUsers);
  		$requete->execute();

  		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

    		return $result;
  		}
  		return false;
	}

	public function session(){

		global $pdo;
		try{

		  $requete = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
		  $requete->execute(array(
			'username' => $this->username));
		  $result = $requete->fetch();
		  $_SESSION['username'] = $this->username;
		  $_SESSION['idUsers']     = $result['idUsers'];
		  $_SESSION['code'] = $result['code'];;
		  $_SESSION['adresse_mail']  = $result['adresse_mail'];
		  return true;
		}catch(PDOException $e)
		{
		  echo "enregistrement de la session du".$e->getMessage($username);
		}
		return false;

	  }

}
