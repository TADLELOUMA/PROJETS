<?

//permet de securiser une chaine caractere
function str_secur($string){
    return trim(htmlspecialchars($string));
}

//Debug plus lisible des differentes variables
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}