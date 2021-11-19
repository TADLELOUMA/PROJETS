<?
require_once('../_config/db.php');
require_once('../_classes/Users.php');
global $pdo;
/*$log =  $_POST['username'];
// echo $log;
$passwrd =  $_POST['password'];

$email = $_POST['email'];
$passwrd_confirmed =  $_POST['Confirmed_Password'];*/
if(isset($_POST['username']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirmedpassword']) )
{
  $inscription = new Users($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirmedpassword']);
  /*echo $_POST['username'];
  echo $_POST['email'];
  echo $_POST['password'];
  echo $_POST['confirmedpassword'];*/
//  if($inscription->verificationUsers() == "verification ok")
    if($inscription->insertionBdd()){
      echo "bon";
    }else echo "mauvais";
/*  else {
    echo "l'inscription a echoué";
  }*/
}