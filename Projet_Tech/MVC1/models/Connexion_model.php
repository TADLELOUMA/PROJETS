<?
class Connexion_model
{
    private $username;
    private $Pass_word;

    function __construct($username,$password){
        global $pdo;

        $this->username = $username;
        $this->Pass_word = $password;

    }

	public function combinaison_connexion_valide($username, $mot_de_pass) {

		global $pdo;
		
		$requete = $pdo->prepare("SELECT * FROM Users 
			WHERE
			username  = :username ");
		$requete->execute(array( 'username' => $this->username ));
		$result = $requete->fetch();
		
		if ($result) {
	
			return $result['idUsers'];
		}else
			return false;
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

}