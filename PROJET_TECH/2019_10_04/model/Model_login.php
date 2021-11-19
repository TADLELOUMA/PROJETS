
<?
    require_once('../controller/index_connexion.php');

    $log =  $_POST['login'];
    $passwrd =  $_POST['password'];
    // $message = FALSE;
    $passhass = password_hash($passwrd, PASSWORD_DEFAULT);
    $sql='SELECT Username,mot_de_pass FROM Users';
    $result = $pdo->query($sql);

        foreach  ($result as $row) {
            if(($row['Username'] == $log) && (password_verify($passwrd,$row['mot_de_pass']))){
                include_once('../index2.php');
                break;
            }else{
                // $message = TRUE;
                $message = "Mot de passe Incorrect";
                include_once('../view/sigOut.php');
            }

        }

        function  message(){
            return "Mot de passe Incorrect";

        
?>