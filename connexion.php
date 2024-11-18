<?php

$user='root';
$mdp=''; 
$server='localhost'; 
$database='gestion_de_ticket';
//$con= new mysqli_connect($user,$mdp,$server, $database);
$con=mysqli_connect('localhost','root','','gestion_de_ticket');
if(!$con) 
{
    echo"erreur";
}


?>