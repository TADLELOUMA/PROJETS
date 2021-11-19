<?php         
/* procedural API */

//CSS
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';



$base = mysqli_connect('dbserver', 'thdiallo', 'Amadou1994', 'thdiallo');
$result = mysqli_query($base, "SELECT nom, prenom, mail  FROM Client WHERE 1");
//var_dump($result);
echo '<table class="table table-striped table-dark">';
echo  '<thead>';
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo '<td>'.$row['nom'].'</td>';
    echo '<td>'.$row['prenom'].'</td>';
    echo '<td>'.$row['mail'].'</td>';
    echo '<tr>';
}
echo '</head>';
echo '</table>';

//JS
echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';

//l'interaction entre l'utilisateur et la base de donnée
echo $_GET ["var"];
//phpinfo();
?>