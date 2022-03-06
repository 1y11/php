<?php 

$con = mysqli_connect("localhost", "root", "", "db_social");
 
// Vérifier la connexion
if($con === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}


?> 