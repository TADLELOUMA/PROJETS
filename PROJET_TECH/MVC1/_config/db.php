<?php

$dsn = 'mysql:host=dbserver;dbname=thdiallo';
$user = 'thdiallo';
$password = 'Amadou1994';
try {
  $pdo = new PDO($dsn,$user,$password);
} catch (Exception $e) {
  echo "Failed: " . $e->getMessage();
}
  


?>
