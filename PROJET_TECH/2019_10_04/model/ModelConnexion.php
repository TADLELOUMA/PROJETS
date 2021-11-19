
<?
    require_once('../controller/index_connexion.php');

    $log =  $_POST['login'];
    // echo $log;
    $passwrd =  $_POST['password'];
   
    $email = $_POST['email'];
    $passwrd_confirmed =  $_POST['Confirmed_Password'];
    $passhass = password_hash($passwrd, PASSWORD_DEFAULT);
    try
    {
        $query = "INSERT INTO Users(Username,mot_de_pass,Email) VALUES ('$log', '$passhass', '$email' )";
        $pdo->query($query);
        // echo "inscription reussi";
    }catch (PDOException $e){
        echo "ajout invalide".$e->getMessage();
    }


 include_once('../index.php');
?>
    