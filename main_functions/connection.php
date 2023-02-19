<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "users"; 

$connection = new mysqli($host, $user, $password, $db_name);
if($connection === false){
    die("errore connessione: " . $connection->connect_error);
}


?>
