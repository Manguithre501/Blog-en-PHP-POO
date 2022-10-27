<?php $dbhost = 'localhost';
$dbname = 'blog'; //Ne doit pas être modifié si vous avez appelé votre bdd "uph"
$dbuser = 'root';
$dbpswd = '';
$port = 3308;
//A partir d'ici, vous ne devez plus rien modifier

try {
    $db = new PDO('mysql:host=' . $dbhost . ';port=' . $port . ';dbname=' . $dbname, $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOexception $e) {
    die("Une erreur est survenue lors de la connexion à la base de données");
}
